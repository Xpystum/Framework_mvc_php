<?php 
	require_once("app/core/Model.php");
	
	//helper
	require_once("app/Helpers/dd.php");

	class OrdersModel extends Model{

		// public function selectOrder($order_id){
		// 	$sql = "SELECT 
        //     orders.id as order_id,
        //     user_id,

        //     order_products.id as orderproduct_id,	
        //     order_id,
        //     product_id,

		// 	products.id	as `product`,
		// 	products.name,
		// 	products.img,
		// 	products.description,
		// 	products.category_id,
		// 	products.price,
		// 	products.old_price	


       	//  	FROM orders INNER JOIN order_products ON orders.id = order_products.order_id
		// 	INNER JOIN products ON order_products.product_id = products.id
        // 	WHERE order_id = ".$order_id;

		// 	$data = $this->getMultyData($sql);
		// 	return $data;
		// }

		
		// запрос на Order -> product Находит продукты связанные с заказом.
		public function selectOrder($user_id){

			$sql = " WITH info AS(
				SELECT 
				order_products.order_id as order_id

				product_id,
				
				products.id as _product_id,
				products.name,
				products.img,
				products.description,
				products.category_id,
				products.price,
				products.old_price	
				
				FROM orders INNER JOIN order_products ON orders.id = order_products.order_id
				INNER JOIN products ON order_products.product_id = products.id
				WHERE orders.user_id = $user_id)
				SELECT order_id , _product_id, `name` , COUNT(*) as count, img, price, old_price, `description` FROM info
				GROUP BY `name` ";
 
			return $this->getMultyData($sql);
		}

		public function selectOrderFromHistory($user_id){

			$sql = "SELECT 

			products.name as product_name,
			products.img as product_img,

			status.name as status_name,

			orders.id as order_id,
			orders.date as order_date,

			order_products.quantity as count_products
			
			FROM `payment_details` INNER JOIN status ON payment_details.status_id = status.id
			INNER JOIN orders ON orders.payment_id = payment_details.id
			INNER JOIN order_products ON order_products.order_id = orders.id
            INNER JOIN products ON order_products.product_id = products.id
            WHERE orders.user_id = $user_id";

			return $this->getMultyData($sql);
		}




		public function createOrder($user_id = null){
			// использовать патттерн состоние для получение в случае ошибки создание
			// и выводить пользователю сообщение об ошибки добавление Ордера или продукта.

			// Ошибка (orders должен создаваться каждый раз когда добавляются товары)
			// $sql = "SELECT * FROM `orders` WHERE user_id = ".$user_id;
			// $data = $this->getData($sql);
			// if($data == null){
			// 	$sql = "INSERT INTO `orders` (user_id, date) VALUES(".$user_id.", NOW())";
			// 	if($this->statusRequest($sql)){
			// 		return true;
			// 	} 	
			// 	else{
			// 		return false;
			// 	}
			// }
			// return True;

			//Payment
			$sql = "INSERT INTO `payment_details` (status_id, amount, `date`) VALUES (DEFAULT , DEFAULT , DEFAULT)";
			$this->statusRequest($sql);
			if(!$this->statusRequest($sql)) return false;
			$payment_id = $this->getLastElementTable('payment_details')['id'];
			
			//orders
			$sql = "INSERT INTO `orders` (user_id, `date`, payment_id) VALUES($user_id , NOW() , $payment_id)";
			return $this->statusRequest($sql);

		}	

		//создаём Payment(по умолчанию при заказе и соединяем orders <-> payment_id)
		private function createPayment(){
			
			$sql = "INSERT INTO `payment_details`";

		}

		public function getLastOrder(){
			return $this->getLastElementTable("orders");
		}

		public function getLastOrderid(){
			$data = $this->getLastElementTable("orders");
			return $data['id'];
		}

		public function SelectOrderId($user_id){
			//поиск заказа по юсеру
			$sql = "SELECT id, `date`, payment_id FROM `orders` WHERE user_id = ".$user_id;
			$data = $this->getData($sql);
			
			if($data == null){
				return null;
			}
			else{
				return $data['id'];
			}
		}

		public function SelectAllOrderId($user_id){

			$sql = "SELECT id, user_id, `date` FROM `orders` WHERE user_id = ".$user_id;
			$data = $this->getMultyData($sql);

			if($data == null){
				return null;
			}
			else{
				return $data['id'];
			}

		}

		public function addProductOrder($product_id = null, $order_id){

			$sql_insert = "INSERT INTO `order_products` (order_id,	product_id) VALUES (".$order_id.", ".$product_id.")";
			return $this->statusRequest($sql_insert);

		}


	}
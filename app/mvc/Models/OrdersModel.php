<?php 
	require_once("app/core/Model.php");
	
	//helper
	require_once("app/Helpers/dd.php");

	class OrdersModel extends Model{

		public function selectOrder($user_id){
			$sql = "SELECT 
			orders.id as order_id,
			user_id,
			
			order_products.id as orderproduct_id,	
			order_id,
			product_id,
			quantity as count,
			total as total_product,
			
			
			products.id	as `product`,
			products.name,
			products.img,
			products.description,
			products.category_id,
			products.price,
			products.old_price	
			
			
			FROM orders INNER JOIN order_products ON orders.id = order_products.order_id
			INNER JOIN products ON order_products.product_id = products.id
			WHERE orders.date = (SELECT MAX(date) FROM orders) AND orders.user_id = ".$user_id;

			$data = $this->getMultyData($sql);

			return $data;
		}

		
		// запрос на Order -> product Находит продукты связанные с заказом.
		// public function selectOrder($user_id){

		// 	$sql = "WITH info AS(
		// 		SELECT 
		// 		order_products.order_id as order_id

		// 		product_id,
				
		// 		products.id as _product_id,
		// 		products.name,
		// 		products.img,
		// 		products.description,
		// 		products.category_id,
		// 		products.price,
		// 		products.old_price	
				
		// 		FROM orders INNER JOIN order_products ON orders.id = order_products.order_id
		// 		INNER JOIN products ON order_products.product_id = products.id
		// 		WHERE orders.user_id = $user_id)
		// 		SELECT order_id , _product_id, `name` , COUNT(*) as count, img, price, old_price, `description` FROM info
		// 		GROUP BY `name` ";
 
		// 	return $this->getMultyData($sql);
		// }

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


		public function exisitsOrder($user_id){
			$sql = "SELECT id FROM orders 
			WHERE EXISTS (SELECT id FROM orders WHERE user_id = $user_id  )
			";
			if(empty($this->getMultyData($sql))){
				return false;
			}else{
				return true;
			}
			
		}

		//Создаем Order, вешаем тригер на payment
		public function createOrder($user_id = null){
			// использовать патттерн состоние для получение в случае ошибки создание
			// и выводить пользователю сообщение об ошибки добавление Ордера или продукта.

			//вешаем триггер 
			try{

				$sql = "CREATE TRIGGER Payment_INSERT BEFORE INSERT ON orders
				FOR EACH ROW
				INSERT INTO `payment_details` (status_id, amount, `date`, order_id) 
				VALUES(DEFAULT , DEFAULT, NOW(), (SELECT id FROM orders ORDER BY id DESC LIMIT 1) );
	
			  	INSERT INTO `orders` (user_id, `date`) VALUES($user_id , NOW() )";
				$data = $this->statusRequest($sql);
				return $data;
				// dd::arrp($this->statusRequest($sql));

			}catch(Exception $e){
				//если триггер уже был повешан
				$sql = "INSERT INTO `orders` (user_id, `date`) VALUES($user_id , NOW() )";
				return $this->statusRequest($sql);
			}


		}	

		public function getLastOrderid($user_id){
			$data = $this->getLastIDElementTable("orders", $user_id);
			return $data['id'];
		}

		public function SelectsOrderId($user_id){
			//поиск заказа по юсеру (вернуть множество)
			$sql = "SELECT id FROM `orders` WHERE user_id = $user_id";
			$data = $this->getMultyData($sql);
			
			return $data;
		}

		public function SelectOrderId($user_id){
			//поиск заказа по юсеру (вернуть в единичном экземпляре)
			$sql = "SELECT id FROM `orders` WHERE user_id = $user_id";
			$data = $this->getData($sql);
			
			return $data;
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




		//пересмотреть написание запроса. (Постараться сделать всё в один запрос)
		public function addProductOrder($product_id = null, $order_id){

			// $sql = "INSERT INTO `order_products` (order_id,	product_id,	count) VALUES(".$order_id.", ".$product_id.", 1)";
			$sql_select = "SELECT id, product_id, quantity FROM `order_products` 
			WHERE order_products.order_id = ".$order_id." AND order_products.product_id =".$product_id;
			$data = $this->getData($sql_select);

			require_once("app/mvc/Models/ProductsModel.php");
			$product = new ProductsModel;
			$data_product = $product->selectProductElement($product_id);

			if( empty($data)  &&  ($data == null) ){
				
				$sql_insert = "INSERT INTO `order_products` (order_id,	product_id,	quantity, price , total) 
				VALUES (".$order_id.", ".$product_id.", 1 , ".$data_product['price'].",".$data_product['price'].")";
				return $this->statusRequest($sql_insert);
			}
			else{
				
				$sql = "SELECT order_id, product_id, quantity FROM `order_products`
				WHERE order_products.order_id = ".$order_id." AND order_products.product_id =".$product_id;

				// получаем столбец из бд, получаем количество и инкреминтируем его
				$order_product_count = $this->getData($sql)['quantity'];
				$order_product_count++;
				$price = $data_product['price'] * $order_product_count;

				// обновляем cout у столбца
				$sql = "UPDATE `order_products`
						SET quantity = $order_product_count, price = $price, total = $price
						WHERE order_products.order_id = ".$order_id." AND order_products.product_id =".$product_id;

				return $this->statusRequest($sql);
			}

			

			
		}

		


	}
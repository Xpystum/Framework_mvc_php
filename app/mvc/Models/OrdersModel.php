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
				order_products.order_id

				product_id,
	
				products.name,
				products.img,
				products.description,
				products.category_id,
				products.price,
				products.old_price	
				
				FROM orders INNER JOIN order_products ON orders.id = order_products.order_id
				INNER JOIN products ON order_products.product_id = products.id
				WHERE orders.user_id = $user_id)
				SELECT `name` , COUNT(*) as count, img, price, old_price, `description` FROM info
				GROUP BY `name` ";
 
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

			$user_id == null ? false : "";

			$sql = "INSERT INTO `orders` (user_id, date) VALUES(".$user_id.", NOW())";
			return $this->statusRequest($sql);

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
			$sql = "SELECT id, `date` FROM `orders` WHERE user_id = ".$user_id;
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

	
			// $sql_select = "SELECT id, product_id, count FROM `order_products` 
			// WHERE order_products.order_id = ".$order_id." AND order_products.product_id =".$product_id;


			
			// if($this->getData($sql_select) == null){
				
				// $sql_insert = "INSERT INTO `order_products` (order_id,	product_id,	count) VALUES (".$order_id.", ".$product_id.", 1)";
				// return $this->statusRequest($sql_insert);
			// }
			// else{
				
			// 	$sql = "SELECT order_id, product_id, count FROM `order_products`
			// 	WHERE order_products.order_id = ".$order_id." AND order_products.product_id =".$product_id;

			// 	// получаем столбец из бд, получаем количество и инкреминтируем его
			// 	$order_product = $this->getData($sql)['count'];
			// 	$order_product++;

			// 	// обновляем cout у столбца
			// 	$sql = "UPDATE `order_products`
			// 			SET count = $order_product
			// 			WHERE order_products.order_id = ".$order_id." AND order_products.product_id =".$product_id;

			// 	return $this->statusRequest($sql);
			// }

			
		}

	}
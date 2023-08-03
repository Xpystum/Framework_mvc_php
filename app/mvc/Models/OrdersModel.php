<?php 
	require_once("app/core/Model.php");

	class OrdersModel extends Model{

		public function selectOrder($order_id){


			$sql = "SELECT 
            orders.id as order_id,
            user_id,

            order_products.id as orderproduct_id,	
            order_id,
            product_id,
            count, 

			products.id	as `product`,
			products.name,
			products.img,
			products.description,
			products.category_id,
			products.price,
			products.old_price	


       	 	FROM orders INNER JOIN order_products ON orders.id = order_products.order_id
			INNER JOIN products ON order_products.product_id = products.id
        	WHERE order_id = ".$order_id;


			$data = $this->getMultyData($sql);
			return $data;
		}

		public function createOrder($user_id = null){
			$sql = "SELECT * FROM `orders` WHERE user_id = ".$user_id;
			$data = $this->getData($sql);
			if($data == null){
				$sql = "INSERT INTO `orders` (user_id, date) VALUES(".$user_id.", NOW())";

				if($this->statusRequest($sql)){
					$sql = "SELECT * FROM `orders` WHERE user_id = ".$user_id;
					$data = $this->getData($sql);
				}

				return $data['id'];
			}
			else{
				return $data['id'];
			}
			
		}

		public function addProductOrder($product_id = null, $order_id){

			// $sql = "INSERT INTO `order_products` (order_id,	product_id,	count) VALUES(".$order_id.", ".$product_id.", 1)";
			$sql_select = "SELECT id, product_id, count FROM `order_products` 
			WHERE order_products.order_id = ".$order_id." AND order_products.product_id =".$product_id;


			
			if($this->getData($sql_select) == null){
				
				$sql_insert = "INSERT INTO `order_products` (order_id,	product_id,	count) VALUES (".$order_id.", ".$product_id.", 1)";
				return $this->statusRequest($sql_insert);
			}
			else{
				
				$sql = "SELECT order_id, product_id, count FROM `order_products`
				WHERE order_products.order_id = ".$order_id." AND order_products.product_id =".$product_id;

				// получаем столбец из бд, получаем количество и инкреминтируем его
				$order_product = $this->getData($sql)['count'];
				$order_product++;

				// обновляем cout у столбца
				$sql = "UPDATE `order_products`
						SET count = $order_product
						WHERE order_products.order_id = ".$order_id." AND order_products.product_id =".$product_id;

				return $this->statusRequest($sql);
			}

			
		}

	}
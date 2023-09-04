<?php 
	require_once("app/core/Model.php");
	require_once("app/mvc/Security/SecurityRegister.php");

	class CuponModel extends Model{
		
		public function getProductAndCupon($name_cupon){
			$name_cupon = SecurityRegister::special_char_html($name_cupon);
			if(isset($name_cupon) && !empty($name_cupon))
			{
				$sql = "SELECT active, id, discount_precent as discount
				FROM discount 
				WHERE `name` = '$name_cupon' AND active = 1";
				return $this->getData($sql);
			}
			return null;
		}	

		public function addCuponFromOrder($id_cupon, $id_order_string){
			// добавление скидочного купона + сразу высчитывание скидки 
			
			$sql = "UPDATE `order_products`
			SET discount_id = '1', 
			total = price * (1 - ( 
				(SELECT discount_precent 
				FROM `discount` WHERE discount.id = '$id_cupon')  / 100) )
			WHERE discount_id IS NULL AND order_id IN ($id_order_string)";

			return $this->statusRequest($sql);
		}

		public function exisitsCuponFromOrder($id_cupon, $id_orders_string){

			$sql = "SELECT COUNT(*) as count
			FROM `order_products` 
			WHERE order_id IN ($id_orders_string) AND (discount_id = $id_cupon OR discount_id IS NOT NULL)";
			$count = $this->getData($sql);
			
			if($count['count'] > 0){
				return true;
			}else{
				return false;
			}
			

		}

	}	
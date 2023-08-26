<?php 
	require_once("app/core/Model.php");

	class CuponModel extends Model{
		
		public function getProductAndCupon($name_cupon){

			$sql = "SELECT 
			discount.name as name_cupon, 
			discount.disc as disc_cupon, 
			discount.discount_precent as precent_copun, 
			discount.active as active_cupon,

			products.id as _products_id,
			products.name as product_name,
			products.price as product_price

			FROM products INNER JOIN discount ON products.discount_id = discount.id
			WHERE discount.name = '$name_cupon' ";
			
			return $this->getMultyData($sql);
		}	

	}
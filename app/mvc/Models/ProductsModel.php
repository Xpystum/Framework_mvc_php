<?php 
	require_once("app/core/Model.php");

	class ProductsModel extends Model{
		// почему метод мы делаем не статический?
		public function selectProductsCategory($id_category){

			$sql = "SELECT * FROM `products` WHERE category_id = ".$id_category;

			$data = $this->getMultyData($sql);

			return $data;
		}

	}
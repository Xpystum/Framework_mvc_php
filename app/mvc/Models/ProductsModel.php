<?php 
	require_once("app/core/Model.php");

	class ProductsModel extends Model{
		// почему метод мы делаем не статический? -> делаем под себя как более удобно, пока что так =)
		public function selectProductsCategory($id_category){

			$sql = "SELECT * FROM `products` WHERE category_id = ".$id_category;

			$data = $this->getMultyData($sql);

			return $data;
		}


		public function selectProductElement($products_id){
			$sql_select = "SELECT id , `name` , img, `description` , category_id, price, old_price FROM `products` 
			WHERE id = $products_id";
			return $this->getData($sql_select);
		}
	}
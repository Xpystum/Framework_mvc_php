<?php 
	require_once("app/core/Model.php");

	class CategoriesModel extends Model{

		public function selectCategoryId($id){

			$sql = "SELECT * FROM `categories` WHERE id = ".$id;

			$data = $this->getData($sql);
		
			return $data;
		}

	}
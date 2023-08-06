<?php 
	require_once("app/core/Model.php");

	class PagesModel extends Model{

		public function selectPageId($id){

			$sql = "SELECT * FROM `pages` WHERE id = ".$id;

			$data = $this->getData($sql);

			return $data;
		}

	}
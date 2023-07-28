<?php 

	class Error404{
		public static function default(){
			require_once("Controllers/IndexController.php");
			$obj = new IndexController();
			$obj->error404Action();
		}
	}
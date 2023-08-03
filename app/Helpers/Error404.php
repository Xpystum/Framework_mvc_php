<?php 

	class Error404{
		public static function default(){
			require_once("app/mvc/Controllers/IndexController.php");
			$obj = new IndexController();
			$obj->error404Action();
		}
	}
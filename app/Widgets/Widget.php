<?php 

	class Widget{

		static public function pathIncludeView($file_name, $data = null){

			include("app/mvc/Views/widgets/".$file_name.".php");
		}
	}
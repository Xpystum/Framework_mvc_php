<?php 

	class Widget{

		static public function pathIncludeView($file_name, $data = null){

			include("Views/widgets/".$file_name.".php");
		}
	}
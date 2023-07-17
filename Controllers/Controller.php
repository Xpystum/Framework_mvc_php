<?php 

	class Controller{

		static function render($pathFile, $data = null, $nameLayout = "default", $widgets = []){


			$page = 'Views/pages/'.$pathFile.'.php';

			include_once('Views/layouts/'.$nameLayout.'.php');

		}
	}



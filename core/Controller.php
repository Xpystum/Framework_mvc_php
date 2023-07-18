<?php 
require_once("Views/View.php");
require_once("Models/Model.php");

	class Controller{

		protected static $model = new Model();
		protected static $view = new View();
 
	    static function render($pathFile, $data = $this->view->$data, $nameLayout = $this->view->$nameLayout, $widgets = $this->view->$widgets){

			self::$view->generate($pathFile, $data, $nameLayout, $widgets);

		}
	}



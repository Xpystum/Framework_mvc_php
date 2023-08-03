<?php 
require_once("View.php");
require_once("Model.php");

	class Controller{

		protected static $model = null;
		protected static $view = null;


		public function __construct()
		{
			self::$model = Model::instance();
			self::$view = new View();

		}
 
	    static function generation($pathFile, $nameLayout , $data = [], $widgets = []){

			self::$view->render(pathFile:$pathFile, data:$data, nameLayout:$nameLayout, widgets:$widgets);

		}
	}



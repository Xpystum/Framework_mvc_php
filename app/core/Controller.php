<?php 
require_once("View.php");
require_once("Model.php");
require_once("app/Helpers/Session.php");


	class Controller{

		protected static $model = null;
		protected static $view = null;
		protected static $session = null;


		public function __construct()
		{
			self::$model = Model::instance();
			self::$view = new View();
			self::$session = new Session();

		}
 
	    static function generation($pathFile, $nameLayout , $data = [], $widgets = []){

			self::$view->render(pathFile:$pathFile, data:$data, nameLayout:$nameLayout, widgets:$widgets);

		}
	}



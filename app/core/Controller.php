<?php 
require_once("View.php");
require_once("Model.php");

	class Controller{

		protected $model = null;
		protected $view = null;


		public function __construct()
		{
			$this->model = Model::instance();
			$this->view = View::instance();
		}
 
	    static function generation($pathFile, $nameLayout ,$data = [] , $widgets = null){

			self::$view->render(pathFile:$pathFile, data:$data, nameLayout:$nameLayout, widgets:$widgets);

		}
	}



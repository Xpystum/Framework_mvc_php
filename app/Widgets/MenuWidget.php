<?php 

	include_once("Widget.php");

	include_once("app/mvc/Models/MenuModel.php");

	class MenuWidget extends Widget{

		static function render($alias, $menu_name = "menu"){

			$model = new MenuModel();
			
			$data = $model->selectFullMenuParant($alias);
			// $data = $model->test();

			Widget::pathIncludeView($menu_name, $data);

		} 

	}


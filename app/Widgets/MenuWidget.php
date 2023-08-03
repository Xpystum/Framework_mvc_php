<?php 

	include_once("Widget.php");

	include_once("app/mvc/Models/MenuModel.php");

	class MenuWidget extends Widget{

		static function render($alias, $menu_name = "menu"){

			$model = new MenuModel();
			
			$data = $model->selectItems($alias);

			Widget::pathIncludeView($menu_name, $data);

		} 

	}
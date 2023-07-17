<?php 

	include_once("Widget.php");
	include_once("Models/MenuModel.php");

	class BasketContentWidget extends Widget{


		static function render($data, $menu_name = "basket"){

			Widget::pathIncludeView($menu_name, $data);
		} 

	}
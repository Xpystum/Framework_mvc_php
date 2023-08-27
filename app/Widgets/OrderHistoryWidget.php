<?php 

	include_once("Widget.php");
	include_once("app/mvc/Models/MenuModel.php");
	require_once("app/Helpers/dd.php");

	class OrderHistoryWidget extends Widget{

		static function render($data, $menu_name = "orderHistory"){

			Widget::pathIncludeView($menu_name, $data);
		} 


	}
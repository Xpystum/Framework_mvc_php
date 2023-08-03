<?php 

	include_once("Widget.php");
	include_once("app/mvc/Models/MenuModel.php");

	class BasketContentWidget extends Widget{


		static function render($data, $menu_name = "basket"){

			Widget::pathIncludeView($menu_name, $data);
		} 

		static function render_table_total($data, $menu_name = "basket-total-table"){

			Widget::pathIncludeView($menu_name, $data);
		} 

	}
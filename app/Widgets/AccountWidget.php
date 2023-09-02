<?php 

	include_once("Widget.php");
	include_once("app/mvc/Models/MenuModel.php");

	class AccountWidget extends Widget{

		static function render($data = null, $menu_name = "AccountAside"){
            // renderim Aside нашего аккаунта
			Widget::pathIncludeView($menu_name, $data);
		} 


	}
<?php 

	include_once("Widget.php");
	include_once("app/mvc/Models/MenuModel.php");

	class AlertStatusWidget extends Widget{

		static function renderStatusWarningModal($data, $menu_name = "AlertWarning"){
            // $data - сообщение о предупрждении
			Widget::pathIncludeView($menu_name, $data);
		} 

        static function renderStatusSuccesModal($data, $menu_name = "AlertSucces"){
            // $data - сообщение ооб успехе
			Widget::pathIncludeView($menu_name, $data);
		} 

	}
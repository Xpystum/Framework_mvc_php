<?php 

	include_once("Widget.php");
	include_once("app/mvc/Models/MenuModel.php");
	require_once("app/Helpers/dd.php");

	class BasketContentWidget extends Widget{


		static function render($data, $menu_name = "basket"){

			Widget::pathIncludeView($menu_name, $data);
		} 

		static function render_table_total($data, $menu_name = "basket-total-table"){

			Widget::pathIncludeView($menu_name, $data);
		} 

		static function render_basket_header_info($data = null, $menu_name = "basket-header-info"){
			$session = new Session();
			$model = new OrdersModel();

			
			$data['basket'] = $model->selectOrder($session->my_session_get('user'));


			$data['info']['flag'] = true;
			// подсчет количество товаров
			$data['info']['count'] = 0;


			for ($i=0; $i < count($data['basket']) ; $i++) { 
				$data['info']['count'] += $data['basket'][$i]['count'];
			}

			Widget::pathIncludeView($menu_name, $data);
		} 

	}
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

		static function render_basket_header_info($data = null, $menu_name = "basket-header-info"){

			$model = new OrdersModel();
			$order_id = $model->SelectOrderId(1); // (1) заглушка нужны сессии 
			
			
			if($order_id != null)
			{
				$data['basket'] = $model->selectOrder($order_id);
			}
			$data['info']['flag'] = true;
			// подсчет количество товаров
			$data['info']['count'] = 0;

			// foreach ($data as $info):
			// 	$data[count($data) - 1]['count'] += $info['count'];
			// endforeach;


			for ($i=0; $i < count($data['basket']) ; $i++) { 
				$data['info']['count'] += $data['basket'][$i]['count'];
			}

			Widget::pathIncludeView($menu_name, $data);
		} 

	}
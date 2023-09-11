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

		static function switchMenu($name, $data){
			switch($name){
				
				case('Fashion'):{
					MenuWidget::rendRecursion('menu/Fashion', $data);
					break;
				}
		
				default:{
					return 0;
					break;
				}
			}
		}

		//вызываем этот метод при рекурсивном выводе меню
		static function rendRecursion($menu_name, $dataValue, $Parent = null){
			
			if($Parent != null){
				$data['children'] = $dataValue;
				$data['parent'] = $Parent;

			}else{
				$data = $dataValue;
			}
			
			// $menu_name - какой файл отрендерить
			// $data - данные child

			Widget::pathIncludeView($menu_name, $data);
		} 

	}


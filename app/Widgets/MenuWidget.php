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

		static function switchMenu($name, $dataValue, $parent){
			switch($name){
				
				case('Fashion'):{
					MenuWidget::rendRecursion('menu/fashion', $dataValue);
					break;
				}

				case('Flower & Gift'):{
					$data['children'] = $dataValue;
					$data['parent'] = $parent;
					MenuWidget::rendRecursion('menu/flower_gift', $data);
					break;
				}

				case('Health & Beauty'):{
					MenuWidget::rendRecursion('menu/health_beauty', $dataValue);
					break;
				}

				case('Smartphone'):{
					
					// dd::arrp($parent);
					$data['children'] = $dataValue;
					$data['parent'] = $parent;

					MenuWidget::rendRecursion('menu/smartphone', $data);
					break;
				}

				
				
		
				default:{
					return 0;
					break;
				}
			}
		}

		//вызываем этот метод при рекурсивном выводе меню
		static function rendRecursion($menu_name, $dataValue, $parent = null){
			
			if($parent != null){
				$data['children'] = $dataValue;
				$data['parent'] = $parent;

			}else{
				$data = $dataValue;
			}
			
			// $menu_name - какой файл отрендерить
			// $data - данные child

			Widget::pathIncludeView($menu_name, $data);
		} 

	}


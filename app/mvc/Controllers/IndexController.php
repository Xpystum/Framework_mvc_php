<?php 
	require_once("app/core/Controller.php");

	require_once("app/mvc/Models/PagesModel.php");
	require_once("app/mvc/Models/CategoriesModel.php");
	require_once("app/mvc/Models/ProductsModel.php");
	require_once("app/mvc/Models/OrdersModel.php");

	require_once("app/Widgets/MenuWidget.php");


	class IndexController extends Controller{

		private $nameLayout = 'default'; // Стандартный шаблон (можно поменять)

		public function pageAction(){
			// обычная типовая страница	
			$nameLayout = $this->nameLayout;

			if(isset($_GET['id'])){
				// запрос к базе данных

				$model = new PagesModel();
				$data = $model->selectPageId($_GET['id']);
			
				if(count($data) == 0){
					$this->error404Action("404");
					die();
				}

				$this->generation($data['alias'], $data);
			}
			else{
				$this->error404Action("404");
			}
		}

		public function indexAction(){
			// главная страница
			$nameLayout = 'index';
			$model = new PagesModel();
			$data = $model->selectPageId(4);
			
			$this->generation('index', $nameLayout , $data);	
		}

		public function categoryAction(){
			// категории товаров
			$nameLayout = $this->nameLayout;
			

			if(isset($_GET['id'])){
				// запрос к базе данных
				$model = new CategoriesModel();
				$data = $model->selectCategoryId($_GET['id']);
				
				if($data == null){
					$this->error404Action("404");
					die();
				}

				$model = new ProductsModel();
				$data['products'] = $model->selectProductsCategory($_GET['id']);

				
				Controller::generation('category', $nameLayout , $data, ['имена виджетов тут']);
			}
			else{
				$this->error404Action("404");
				die();
			}
			
		}

		public function error404Action(){
			// страница не найдена
			$nameLayout = $this->nameLayout;
			$this->generation('404',$nameLayout);
		}


		public function cartaddAction(){

			echo "зашёл";
		
			if(isset($_POST['id_product'])){
				$model = new OrdersModel();
				// $model->createOrder(1) //заглушка на пользователя (надо делать по сессиям)
				if(!$model->createOrder(1)){
					echo "Ошибка Создание Order";
				}
				
				$order_id = $model->SelectOrderId(1); //заглушка на пользователя (надо делать по сессиям)
				if(!$model->addProductOrder($_POST['id_product'], $order_id)){
					echo "ошибка добавление";
				}
			}

			header("location:?route=index/cart&order_id=".$order_id);
		}

		public function cartAction(){
			$nameLayout = $this->nameLayout;
			if(isset($_GET['order_id'])){
				$data = null;
				$model = new OrdersModel();
				$data = $model->selectOrder($_GET['order_id']);

				$this->generation('cart', $nameLayout  ,$data);
			}

			// if($_GET['order_id'] == "false"){
			// 	$this->generation('cart', $nameLayout  , null);
			// }
			
			
		}
	}
<?php 
	require_once("app/core/Controller.php");

	require_once("app/mvc/Models/PagesModel.php");
	require_once("app/mvc/Models/CategoriesModel.php");
	require_once("app/mvc/Models/ProductsModel.php");
	require_once("app/mvc/Models/OrdersModel.php");
	require_once("app/mvc/Models/CuponModel.php");
	
	require_once("app/Widgets/MenuWidget.php");

	//session
	require_once("app/Helpers/Session.php");

	//helper
	require_once("app/Helpers/dd.php");


	class IndexController extends Controller{

		private $nameLayout = 'default'; // Стандартный шаблон (можно поменять)
		private $dataTitle = 'MySite'; // можно менять
		
		
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
		

			if(isset($_GET['id']) && !empty(self::$session->my_session_get('user'))){
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
				self::$session->my_session_flash_set('warning','Вход не выполнен');
				$this->generation('404', $nameLayout);
				die();
			}
			
		}

		public function error404Action(){
			// страница не найдена
			$nameLayout = $this->nameLayout;
			$this->generation('404',$nameLayout);
		}


		public function cartaddAction(){

		
			if(isset($_POST['id_product'])){
				$model = new OrdersModel();
				
				$session = new session();
				$SessionUser = $session->my_session_get('user');
				// $model->createOrder(1) //заглушка на пользователя (надо делать по сессиям)

				if(!$model->createOrder($SessionUser)){
					echo "Ошибка Создание Order";
				}
				
				
				$order_id = $model->getLastOrderid(); //заглушка на пользователя (надо делать по сессиям)

				if(!$model->addProductOrder($_POST['id_product'], $order_id)){
					echo "ошибка добавление";
				}

				header("location:?route=index/cart&order_id=".$session->my_session_get('user'));
				die();
			}
			else{
				header("location:?route=index/index");
				die();
			}

		}

		//Карта заказа
		public function cartAction(){
			$nameLayout = $this->nameLayout;
			$session = new session();
			$user = $session->my_session_get('user');
			
		
			$data = null;
			$model = new OrdersModel();
			$data = $model->selectOrder($user);

			$this->generation('cart', $nameLayout  , $data);
		
		}

		public function cartCuponAction(){

			//добавил купон в сессию
			if(isset($_POST['cupon'])){
				$model = new CuponModel();
				$product_cupon = $model->getProductAndCupon($_POST['cupon']);
				if(empty($product_cupon) && $product_cupon == null){
					self::$session->my_session_flash_set('warning','Такого купона нету.');
					header("location:?route=index/cart");
				}
				self::$session->my_session_flash_set('cupon', $product_cupon);

				self::$session->my_session_flash_set('succes','Купон успешно активирован');
				header("location:?route=index/cart");
				die();
			}else{
				header("location:?route=index/cart");
				die();
			}

		}

		public function orderAccountAction(){
			
			$nameLayout = $this->nameLayout;
			$model = new OrdersModel();	
			$session = new Session();
			$data = $model->selectOrderFromHistory($session->my_session_get('user'));
			dd::arrp($data);
			
			

			$this->generation('orderHistory', $nameLayout );
		}

		#region Служебные приватные методы

		private function rederFromSession($pathFile, $string = null){

			if(self::$session->my_session_get('user') === null){
				$this->generation($pathFile, $this->nameLayout);
			}else{
				echo 'user != null';
			}

		}
		
		#endregion

	}
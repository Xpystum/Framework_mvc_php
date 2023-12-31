<?php 
	require_once("app/core/Controller.php");

	require_once("app/mvc/Models/PagesModel.php");
	require_once("app/mvc/Models/CategoriesModel.php");
	require_once("app/mvc/Models/ProductsModel.php");
	require_once("app/mvc/Models/OrdersModel.php");
	require_once("app/mvc/Models/CuponModel.php");
	require_once("app/mvc/Models/OrderHistoryModel.php");
	
	require_once("app/Widgets/MenuWidget.php");

	//session
	require_once("app/Helpers/Session.php");

	//helper
	require_once("app/Helpers/dd.php");
	

	//Api
	require_once("app/API/ApiСurrency.php");


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

			// $modeMenu = new MenuModel();
			// dd::arrp($modeMenu->selectItemMenuParant('departament_menu'));
			
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

		
			if(isset($_POST['id_product']) && (!empty((new Session)->my_session_get('user')))){
				$model = new OrdersModel();
				
				$session = new session();
				$sessionUser = $session->my_session_get('user');
				if(!$model->exisitsOrder($sessionUser)){
					$model->createOrder($session->my_session_get('user'));
				}

			
				$order_id = $model->getLastOrderid($sessionUser); 

				if(!$model->addProductOrder($_POST['id_product'], $order_id)){
					echo "ошибка добавление";
				}

				header("location:?route=index/cart");
				die();
			}
			else{
				header("location:?route=index/index");
				die();
			}

		}

		//Карта заказа
		public function cartAction(){

			$session = new Session();
			if(!empty($session->my_session_get('user'))){
				$nameLayout = $this->nameLayout;
				$user = $session->my_session_get('user');
			
				$data = null;
				$model = new OrdersModel();
				$data = $model->selectOrder($user);

				// dd::arrv($data);

				$this->generation('cart', $nameLayout  , $data);
			}else{
				self::$session->my_session_flash_set('warning','Пожалуйста ввойдите в свой Аккаунт');
				header("location:?route=auth/login");
				die();
			}
		
		} 

		public function cartCuponAction(){

			//логика купона
			if(isset($_POST['cupon']) && !empty(self::$session->my_session_get('user')) ){
				$model = new CuponModel();
				$orders = (new OrdersModel())->SelectOrderId(self::$session->my_session_get('user'));
				$cupon = $model->getProductAndCupon($_POST['cupon']);
				if(!isset($cupon) && empty($cupon)){
					self::$session->my_session_flash_set('warning','Такого купона нету.');
					header("location:?route=index/cart");
					die();
				}
				if($model->exisitsCuponFromOrder($cupon['id'],  $orders['id']) ){
					self::$session->my_session_flash_set('warning','Купон уже активирован.');
					header("location:?route=index/cart");
					die();
				}else{
					$model->addCuponFromOrder($cupon['id'], $orders['id']);
					self::$session->my_session_flash_set('cupon', $cupon);
					self::$session->my_session_flash_set('succes','Купон успешно активирован');
					header("location:?route=index/cart");
					die();
				}
				
			}else{
				header("location:?route=index/cart");
				die();
			}

		}

		public function sessionClearAction(){
			//очистка сессии + куки
			self::$session->full_clear_session();

			self::$session->my_session_flash_set('succes','Вы успешно вышли из своего Аккаунта');
			header("location:?route=index/index&succesacc=true");
			die();
		}

		public function orderAccountAction(){
			
			if(!empty(self::$session->my_session_get('user')))
			{
				function separate_order($orders){
					$dataOrder = null;
					foreach($orders as $order['id']){
						$dataOrder[] = array_shift($order['id']);
					}
					return $dataOrder;
				}
	
				$nameLayout = $this->nameLayout;
				$model = new OrderHistoryModel();	
				$session = new Session();
				$orders = (new OrdersModel())->SelectsOrderId($session->my_session_get('user'));
				$orders = separate_order($orders);
				//есть проблема со статосом из-за верстки (нужно статус вешать на весь ордер)
				foreach($orders as $order){
					$dataOrder[$order] = $model->selectOrderHistory($order);
				}
				$this->generation('orderHistory', $nameLayout, $dataOrder);
			}else{
				self::$session->my_session_flash_set('warning','Войдите в свой аккаунт');
				header("location:?route=index/index");
				die();
			}
			
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
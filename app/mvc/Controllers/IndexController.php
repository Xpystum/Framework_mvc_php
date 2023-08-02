<?php 
	require_once("app/core/Controller.php");

	require_once("app/mvc/Models/PagesModel.php");
	require_once("app/mvc/Models/CategoriesModel.php");
	require_once("app/mvc/Models/ProductsModel.php");
	require_once("app/mvc/Models/OrdersModel.php");

	require_once("app/Widgets/MenuWidget.php");

	class IndexController extends Controller{

		private $nameLayout = 'default'; // Стандартный шаблон (можно поменять)

		// function __construct()
		// {
		// 	self::$model = Model::instance();
		// 	self::$view 
		// }

		public function pageAction(){
			// обычная типовая страница	
			$nameLayout = $this->nameLayout;

			if(isset($_GET['id'])){
				// запрос к базе данных

				$model = new PagesModel();
				$data = $model->selectPageId($_GET['id']);
	
				if(count($data) == 0){
					Controller::generation('404',$nameLayout);
					die();
				}

				Controller::generation($data['alias'], $data);
			}
			else{
				Controller::generation('404', $nameLayout);
			}
		}

		public function indexAction(){
			// главная страница
			$nameLayout = 'index';
			$model = new PagesModel();
			$data = $model->selectPageId(4);
			
			Controller::generation('index', $nameLayout , $data);	
		}


		public function categoryAction(){
			// категории товаров
			$nameLayout = $this->nameLayout;

			if(isset($_GET['id'])){
				// запрос к базе данных
				
				$model = new CategoriesModel();
				$data = $model->selectCategoryId($_GET['id']);
				
				if(count($data) == 0){
					Controller::generation('404',$nameLayout);
					die();
				}

				$model = new ProductsModel();
				$data['products'] = $model->selectProductsCategory($_GET['id']);

				Controller::generation('category', $nameLayout ,$data, ['здесь будут имена виджетов из базы данных']);
			}
			else{
				Controller::generation('404',$nameLayout);
			}
		}

		public function error404Action(){
			// страница не найдена
			$nameLayout = $this->nameLayout;
			Controller::generation('404',$nameLayout);
		}


		public function cartaddAction(){
			// страница не найдена
			$nameLayout = $this->nameLayout;

			if(isset($_POST['id_product'])){
				$model = new OrdersModel();
				$order_id = $model->createOrder(1); //заглушка

				if(!($model->addProductOrder($_POST['id_product'], $order_id))){
					echo "ошибка добавление";
				}
			}

			header("location: ?route=index/cart&order_id=".$order_id);
		}

		public function cartAction(){
			$nameLayout = $this->nameLayout;

			if(isset($_GET['order_id'])){
				$data = null;
				$model = new OrdersModel();
				$data = $model->selectOrder($_GET['order_id']);

				Controller::generation('cart', $nameLayout  ,$data);
			}
			
		}
	}
<?php 
	require_once("Controller.php");

	require_once("Models/PagesModel.php");
	require_once("Models/CategoriesModel.php");
	require_once("Models/ProductsModel.php");
	require_once("Models/OrdersModel.php");

	require_once("Widgets/MenuWidget.php");

	class IndexController extends Controller{
		public function pageAction(){
			// обычная типовая страница

			if(isset($_GET['id'])){
				// запрос к базе данных

				$model = new PagesModel();
				$data = $model->selectPageId($_GET['id']);
	
				if(count($data) == 0){
					Controller::render('404');
					die();
				}

				Controller::render($data['alias'], $data);
			}
			else{
				Controller::render('404');
			}
		}

		public function indexAction(){
			// главная страница
			$model = new PagesModel();
			$data = $model->selectPageId(4);
			Controller::render('index', $data, 'index');
		}


		public function categoryAction(){
			// категории товаров


			if(isset($_GET['id'])){
				// запрос к базе данных
				$model = new CategoriesModel();
				$data = $model->selectCategoryId($_GET['id']);
				
				if(count($data) == 0){
					Controller::render('404');
					die();
				}

				$model = new ProductsModel();
				$data['products'] = $model->selectProductsCategory($_GET['id']);

				Controller::render('category', $data, 'default', ['здесь будут имена виджетов из базы данных']);
			}
			else{
				Controller::render('404');
			}
		}

		public function error404Action(){
			// страница не найдена
			Controller::render('404');
		}


		public function cartaddAction(){
			// страница не найдена

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

			if(isset($_GET['order_id'])){
				$data = null;
				$model = new OrdersModel();
				$data = $model->selectOrder($_GET['order_id']);

				Controller::render('cart', $data);
			}

			
		}
	}
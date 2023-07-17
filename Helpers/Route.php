<?php 

	require_once("Helpers/Error404.php");

	class Route{

		static public function urlParse(){
			// http://localhost/framework?route=index/index

			if(isset($_GET['route']) && !empty($_GET['route'])){
				// вроде как есть параметры

				$routeParams = explode("/", $_GET['route']);

				if(count($routeParams) != 2){
					// 404
					Error404::default();
					return 0;
				}

				$controllerName = $routeParams[0];
				$actionName = $routeParams[1];

				$controllerName = ucfirst($controllerName);

				if(!file_exists("Controllers/".$controllerName."Controller.php")){
					// 404
					Error404::default();
					return 0;
				}

				require_once("Controllers/".$controllerName."Controller.php");


				if(!method_exists($controllerName."Controller", $actionName."Action")){
					// 404
					Error404::default();
					return 0;
				}

				$class = $controllerName."Controller";
				$obj = new $class();
				
				$methodName = $actionName."Action";
				$obj->$methodName();
				
			}
			else{
				// вызов главной страницы
				require_once("Controllers/IndexController.php");
				$obj = new IndexController();
				$obj->indexAction();
			}
		}
	}
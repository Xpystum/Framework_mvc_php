<?php 
	require_once("app/core/Controller.php");

	require_once("app/mvc/Models/PagesModel.php");
	require_once("app/mvc/Models/CategoriesModel.php");
	require_once("app/mvc/Models/ProductsModel.php");
	require_once("app/mvc/Models/OrdersModel.php");

	require_once("app/Widgets/MenuWidget.php");
	require_once("app/mvc/Validator/Validator.php");
	require_once("app/mvc/Validator/ValidatorRegister.php");
	require_once("app/Exception/ValidatorException.php");
    
    

	class AuthController extends Controller{

        private $nameLayout = 'default'; // Стандартный шаблон (можно поменять)

		public function rendergisterAction(){


			$this->generation('register', $this->nameLayout);
		}

        public function registerAction(){

            $validator = new ValidatorRegister();
			$data = $validator->validate_register($_POST);
			$dataJson = json_encode($data);
			echo $dataJson;

			if($validator->get_status_valid()){
				
			}	
			else{
				header("location:?route=auth/rendergister&valid=".$dataJson);
				// header("location:?route=auth/rendergister&password=".$data["password"]."&firstname=".$data["firstname"]."&lastname=".$data["lastname"]."&confirm=".$data["confirm"]."&email=".$data["email"]);
			}
		
			// if(isset($_POST)){
               
			// 	$string = $_POST['firstname'];

			// 	$a = filter_var($string, FILTER_VALIDATE_REGEXP,
			// 	array("options"=>
			// 	array("regexp"=>'/(?=.*[0-9])(?=.*[!@#$%^&.\\\\*\/"])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/')));
			// 	$a = strip_tags($a);
			// 	echo var_dump($a);


			// 	// $this->generation('cart', $nameLayout  ,$data);
			// }
            // else{

            // }
		}

		
    }
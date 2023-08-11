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
	require_once("app/mvc/Models/RegisterModel.php");
    
    

	class AuthController extends Controller{

        private $nameLayout = 'default'; // Стандартный шаблон (можно поменять)

		
		
		public function rendergisterAction(){


			$this->generation('register', $this->nameLayout);
		}

        public function registerAction(){

            $validator = new ValidatorRegister();
			$data['status'] = $validator->validate_register($_POST);
			$data['info'] = null;


			foreach($_POST as $key => $value){	
				if($key == 'password'){ continue; }
				$data['info']["$key"] = $value;
			}	

			
			$dataJson = json_encode($data);

			if($validator->get_status_valid()){
				$a = new RegisterModel();
				echo $a->addUser($_POST);
			}		
			else{
				header("location:?route=auth/rendergister&valid=".$dataJson);
				die();
			}
		
		}

    }
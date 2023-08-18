<?php 
	require_once("app/core/Controller.php");


	require_once("app/mvc/Models/PagesModel.php");
	require_once("app/mvc/Models/CategoriesModel.php");
	require_once("app/mvc/Models/ProductsModel.php");
	require_once("app/mvc/Models/OrdersModel.php");


	require_once("app/Widgets/MenuWidget.php");

	require_once("app/mvc/Validator/ValidatorUpdateAccount.php");
	require_once("app/mvc/Validator/Validator.php");
	require_once("app/mvc/Validator/ValidatorRegister.php");
	require_once("app/mvc/Validator/ValidatorPasswordUser.php");


	require_once("app/Exception/ValidatorExceptionRegister.php");
	require_once("app/mvc/Models/RegisterModel.php");
	require_once("app/mvc/Security/SecurityRegister.php");


	require_once("app/mvc/Models/UserModel.php");
    

	class AuthController extends Controller{

        private $nameLayout = 'default'; // Стандартный шаблон (можно поменять)
		private $dataTitle = 'MySite';

		// рендеринг страница регистрации
		public function rendergisterAction(){

			
			$this->renderFromSessionOut('register','Ошибка Регистрации Выйдите из Аккаунта');
		}	

		// рендеринг страницы входа
		public function loginAction(){


			$this->renderFromSessionOut('login', 'Ошибка входа, вы уже вошли');
		}

		//мой аккаунт
		public function myaccountAction(){


			$this->renderFromSessionInput('myaccountsystem','Ошибка входа в аккаунт');
		}	

		//служебный метод для обработки аккаунта
		public function myaccountsystemAction(){

				$data = $this->getDataMyAccount();
				
				if(isset($data)){
					$this->generation("account", $this->nameLayout, $data);
				}
				else{
					$this->renderFromSessionInput('login','Ошибка входа в аккаунт');
					die();
				}
		}	

		//отправка POST запроса для обновление данных из аккаунта
		public function updateAccountAction(){

			if(isset($_POST)){

				$validator = new ValidatorUpdateAccount();
				$data['status'] = $validator->validate_register($_POST);
				$data['info'] = null;
				
				var_dump($_POST);
				// var_dump($data['status']);

				die();

				// запись значение для их вывода при ошибки (что бы пользователь не вводил по много раз данные при обновлении)
				foreach($_POST as $key => $value){	
					if($key == 'password'){ continue; }
					$data['info']["$key"] = $value;
				}
				
				// //преобразование небозопасных html символов
				foreach($data['info'] as $key => $value){	
					$data['info'][$key] = SecurityRegister::strip_tags_html($value);
				}

				
				$dataJson = json_encode($data); 	
	
				if($validator->get_status_valid()){
					$a = new RegisterModel();
					if($a->addUser($_POST)){
						// передать flash сообщение через сессию что добавилось успешно

						self::$session->my_session_flash_set('succes','Вы Успешно Зарегистрировались');
						header("location:?route=index/index");
						die();
					}
					else{
						//оповещение об ошибки добавление

						self::$session->my_session_flash_set('warning','Ошибка Регистрации');
						header("location:?route=index/index");
						die();
					}
				}		
				else{
					// Ошибка прохождение валидации (reg выражение) -> возврат к регистрации
					header("location:?route=auth/rendergister&valid=".$dataJson);
					die();
				}
				
			}

		}

		// служебный метод для обработки входа
		public function inputloginAction(){
			if(isset($_POST)){		
				$user = new UserModel();
				$data = $user->selectUserEmail($_POST['email']);
				if(isset($data)){
					$pass = new ValidatorPasswordUser;
					if($pass->checkPasswordUser($_POST['password'], $data)){
						
						$data = $user->SelectUsersFromInput($data['id']);
						self::$session->my_session_set('user', $data['id']);
						self::$session->my_session_flash_set('succes','Вы Успешно Вошли');
						header("location:?route=index/index");
						die();
					}else{
						// self::$session->my_session_flash_set('warning','Ошибка Логина или Пароля');
						header("location:?route=auth/login&succes=0");
						die();
					}
				}
				else{
					// self::$session->my_session_flash_set('warning','Ошибка Логина или Пароля');
					header("location:?route=auth/login&succes=0");
					die();
				}
			}
		}

		// служебный метод для обработки регистрации
        public function registerAction(){	

			if(isset($_POST)){
				$validator = new ValidatorRegister();
			
				$data['status'] = $validator->validate_register($_POST);
				$data['info'] = null;
				
				// запись значение для их вывода при ошибки (что бы пользователь не вводил по много раз данные при обновлении)
				foreach($_POST as $key => $value){	
					if($key == 'password'){ continue; }
					$data['info']["$key"] = $value;
				}	
				
				// //преобразование небозопасных html символов
				foreach($data['info'] as $key => $value){	
					$data['info'][$key] = SecurityRegister::strip_tags_html($value);
				}	

				
				$dataJson = json_encode($data); 	
	
				if($validator->get_status_valid()){
					$a = new RegisterModel();
					if($a->addUser($_POST)){
						// передать flash сообщение через сессию что добавилось успешно
						self::$session->my_session_flash_set('succes','Вы Успешно Зарегистрировались');
						header("location:?route=index/index");
						die();
					}
					else{
						//оповещение об ошибки добавление
						self::$session->my_session_flash_set('warning','Ошибка Регистрации');
						header("location:?route=index/index");
						die();
					}
				}		
				else{
					// Ошибка прохождение валидации (reg выражение) -> возврат к регистрации
					header("location:?route=auth/rendergister&valid=".$dataJson);
					die();
				}
			}
			else{
				//ошибка POST запроса
				self::$session->my_session_flash_set('warning','Ошибка Отправки формы');
				header("location:?route=auth/rendergister");
				die();
			}
		
		}

		#region Служебные приватные методы

			//если вход не выполнен для login/register
			private function renderFromSessionOut($pathFile, $string = null, $dataTtile = 'MySite'){
				$data['title'] = $dataTtile;
				if(self::$session->my_session_get('user') === null){
					$this->generation($pathFile, $this->nameLayout, $data);
				}else{
					self::$session->my_session_flash_set('warning', $string);
					Error404::default();
				}

			}

			//если вход выполнен
			private function renderFromSessionInput($pathFile){

				if(self::$session->my_session_get('user') != null){
					header("location:?route=auth/".$pathFile);
				}else{
					self::$session->my_session_flash_set('warning','Вход не выполнен');
					header("location:?route=auth/login");
					die();
				}

			}

			private function getDataMyAccount(){
				$user = new UserModel();
				$data = null;
				$data['user'] = $user->SelectUsersAndUsersInput(self::$session->my_session_get('user'));
				// [0] - нужен для получение массива, *либо будет массив в массиве
				
				$data['address_payment'] = $user->SelectAdressTypeUser(self::$session->my_session_get('user'), 1);
				if(!empty($data['address_payment'])) $data['address_payment'] = $data['address_payment'][0];
				$data['address_shipping'] = $user->SelectAdressTypeUser(self::$session->my_session_get('user'), 2);
				if(!empty($data['address_shipping'])) $data['address_shipping'] = $data['address_shipping'][0];
				$data['country'] = $user->SelectCountry();
				$data['region'] = $user->SelectRegion();

				return $data;
			}
			
		#endregion

	}
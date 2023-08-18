<?php 
	require_once("app/core/Model.php");

	class UserModel extends Model{
		
		public function selectUserId($id){
			$sql = "SELECT 
			id, 
			email, 
			`name`,
			surname,
			telephone,
			fax,
			company,
			adress_1,
			adress_2,
			city,
			post_code,
			country,
			region_state
			FROM  `users` 
			WHERE id = '$id' ";
			
            $data = $this->getData($sql);
            return $data;
		}

		public function selectUserEmail($email){
			$sql = "SELECT id, email, `password` FROM  `users_input` WHERE email = '$email' ";
			
            $data = $this->getData($sql);
            return $data;
		}

		public function UpdatePassword($email, $newHash){
			$sql = "UPDATE `users_input` 
			SET `password` = '$newHash'
			WHERE email = '$email'";
			return $this->statusRequest($sql);
		}

		//вовращает Users по полю users_input_id
		public function SelectUsersFromInput($value_id){	
			//$value_id - Значение поле user_input_id
			$sql = "SELECT 
			id,
			`name`,
			surname,
			telephone,
			fax
			FROM `users` 
			WHERE users_input_id  = '$value_id' ";

			$data = $this->getData($sql);
			return $data;
		}


		//Возвращает объеденённую таблицу User_input и Users
		public function SelectUsersAndUsersInput($value_id){	
			//id users

			$sql = "SELECT 

			users_input.email,
			users_input.password,

			users.users_input_id,
			users.name as `name`,
			users.surname as surname,
			users.telephone as telephone,
			users.fax as fax
			

			FROM `users_input` INNER JOIN users ON users_input.id = users.users_input_id
			WHERE users.id = '$value_id'";
			


			$data = $this->getData($sql);
			return $data;
		}	

		//1 - payment
		//2 - shipping

		//получение Adress в зависимости от Payment или shipping через id user, 
		public function SelectAdressTypeUser($value_id, $type_id){	
			// $value_id - id юзера
			//$type_id - тип таблицы

			$sql =  "SELECT adress_union_id FROM users_table WHERE users_id = '$value_id'";

			$data = $this->getMultyData($sql);
			$dataMass = null; // получаем значение 
			foreach($data as $value){
				foreach($value as $val){
					$dataMass[] = $val;
				}
			}

			if(count($dataMass) <= 1){
				//СТРАШНЫЙ ЗАПРОС
				$sql = "SELECT 
				company,
				`address`,
				city,
				country_id,
				region_id,
				post_code
				FROM `adress_user` WHERE id = (SELECT adress_user_id 
				FROM 
				(SELECT adress_type_id, adress_user_id FROM adress_union WHERE id IN ('$dataMass[0]') ) AS add_union	
				WHERE add_union.adress_type_id = '$type_id')";
			}
			else{
				//СТРАШНЫЙ ЗАПРОС
				$sql = "SELECT 
				company,
				`address`,
				city,
				country_id,
				region_id,
				post_code
				FROM `adress_user` WHERE id = (SELECT adress_user_id 
				FROM 
				(SELECT adress_type_id, adress_user_id FROM adress_union WHERE id IN ('$dataMass[0]', '$dataMass[1]') ) AS add_union	
				WHERE add_union.adress_type_id = '$type_id')";
			}

				

			$data = $this->getMultyData($sql);
			return $data;	
			
		}

		//получение всех стран
		public function SelectCountry(){
			$sql = 'SELECT id , country FROM country';
			$data = $this->getMultyData($sql);
			return $data;

		}

		//получение всех регионов
		public function SelectRegion(){
			$sql = "SELECT id, region FROM region";
			$data = $this->getMultyData($sql);
			echo var_dump($data);
			return $data;

		}
	}
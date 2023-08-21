<?php 
	require_once("app/core/Model.php");

	class UserModel extends Model{
		
		// public function selectUserId($id){
		// 	$sql = "SELECT 
		// 	id, 
		// 	email, 
		// 	`name`,
		// 	surname,
		// 	telephone,
		// 	fax,
		// 	company,
		// 	adress_1,
		// 	adress_2,
		// 	city,
		// 	post_code,
		// 	country,
		// 	region_state
		// 	FROM  `users` 
		// 	WHERE id = '$id' ";
			
        //     $data = $this->getData($sql);
        //     return $data;
		// }

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
		public function SelectAdressTypeUser($userId, $type_id){	
			//$userId - id юзера
			//$type_id - тип таблицы

			$sql =  "SELECT adress_union_id FROM users_table WHERE users_id = '$userId'";

			$data = $this->getMultyData($sql);
			$dataMass = null; // получаем значение 
			foreach($data as $value){
				foreach($value as $val){
					$dataMass[] = $val;
				}
			}

			if(count($dataMass) <= 1){
				//СТРАШНЫЙ ЗАПРОС - переделать))
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
				//СТРАШНЫЙ ЗАПРОС - переделать))
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

			
			// $sql = "SELECT 
			// adress_user.id as id,
			// company,
			// `address`,
			// city,
			// country_id,
			// region_id,
			// post_code
			
			// FROM `adress_user` INNER JOIN adress_union ON adress_user.id = adress_union.adress_user_id
			// INNER JOIN users_table ON adress_union.id = users_table.adress_union_id
			// WHERE users_table.users_id = '$user'";
				

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
			return $data;
		}

		public function UpdateUser($value, $user){
			//$value - значение user
			//$user - id user "из сессии"
			// можно по email находить (но могут быть ошибки лучше по id)

			$name = $value['firstname'];
			$surname = $value['lastname'];
			$telephone = $value['telephone'];
			$fax = $value['fax'];

			$sql = "UPDATE `users` 
			SET `name` = '$name ' , surname = '$surname', telephone = '$telephone', fax = '$fax' 
			WHERE id = $user";
			
			return $this->statusRequest($sql);
		}

		public function UpdateUserInput($value, $user){
			//$value - значение user
			////$user - id user "из сессии"

			$email = $value['email'];
			$new_password = $value['new_password'];

			$sql = "UPDATE `users_input` 
			SET email = '$email' , `password` = '$new_password'
			WHERE id = $user";

			return $this->statusRequest($sql);
		}

		
		public function UpdateAddress($value, $user, $type){
			//$value - значение address
			//$user - id user "из сессии"
			//$type - тип Адресса 1 - payment, 2 - shipping
			$company = $value['company'];
			$address = $value['address'];
			$city
			$country_id
			$post_code

			$sql = "SELECT 
			adress_user.id as id
			FROM `adress_user` INNER JOIN adress_union ON adress_user.id = adress_union.adress_user_id
			INNER JOIN users_table ON adress_union.id = users_table.adress_union_id
			WHERE users_table.users_id = '$user' AND adress_union.adress_type_id = 1";

			

			$addressId = $this->getData($sql);

			$sqk = "UPDATE `adress_user` 
			SET email = '$email' , `password` = '$new_password'
			WHERE id = $user"
			
		}
		
	}
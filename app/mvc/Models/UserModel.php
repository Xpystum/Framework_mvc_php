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
			$sql = "SELECT id, email, `password` FROM  `users` WHERE id = '$email' ";
			
            $data = $this->getData($sql);
            return $data;
		}

		public function UpdatePassword($email, $newHash){
			$sql = "UPDATE `users` 
			SET `password` = '$newHash'
			WHERE email = '$email'";
			return $this->statusRequest($sql);
		}

	}
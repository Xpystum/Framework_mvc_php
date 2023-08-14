<?php 
    require_once("app/mvc/Security/SecurityRegister.php");
    class RegisterModel extends Model{

        public function addUser($data_post){
            //Здесь проверку (существует ли такой пользователь)
            $func_strip = 'SecurityRegister::strip_tags_html';
            $email = $func_strip($data_post['email']);
            $firstname = $func_strip($data_post['firstname']);
            $lastname = $func_strip($data_post['lastname']);
            $telephone = $func_strip($data_post['telephone']);
            $fax = $func_strip($data_post['fax']);   
            $company = $func_strip($data_post['company']);
            $address_1 = $func_strip($data_post['address_1']);
            $address_2 = $func_strip($data_post['address_2']);
            $city = $func_strip($data_post['city']);
            $postcode = $func_strip($data_post['postcode']);
            $country_id = $func_strip($data_post['country_id']);
            $region_state = $func_strip($data_post['zone_id']);
            $password = password_hash($func_strip($data_post['password']),PASSWORD_DEFAULT);

            $sql_add = "INSERT INTO `users`
            (email, name, surname, telephone, fax, company, adress_1, adress_2, city, post_code, country, region_state,  password)
            VALUES ('$email', '$firstname', '$lastname', '$telephone', '$fax', '$company'   , '$address_1', '$address_2', '$city', '$postcode', '$country_id', '$region_state'
            ,'$password') ";

            // echo $sql_add;

            return $this->statusRequest($sql_add);
        }
        
    }
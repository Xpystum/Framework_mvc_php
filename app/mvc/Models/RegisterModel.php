<?php 
    require_once("app/mvc/Security/SecurityRegister.php");
    require_once("UserModel.php");
    class RegisterModel extends Model{

        public function addUser($data_post){

            $UserBD = new UserModel();
            $status = null;

            function checkStatus($value){

                if($value){
                    return true;
                }
                else{
                    return false;
                }
            }

            $UserId = null; //айдишник user (email. pasw)
            $AdressUserId = null; // айдишник адреса
            $UserInfo = null; // айдишник пользователя (информация о пользователе)
            $AdressType = 1; // значение 1 - Адрес оплаты, 2 - Адрес перевозки
            // 1 т.к регистрация всегда подразумевает Адрес пользователя 

            //Таблицы
            $AdressUnion_id = null;
            

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
            $password = password_hash($func_strip($data_post['password']), PASSWORD_DEFAULT);

            // запрос на добавление в таблицу users_input
            $sql_add = "INSERT INTO `users_input` 
            (email, `password`) VALUES ('$email', '$password')";

            //добавление  в таблицу users_input
            if(!checkStatus($this->statusRequest($sql_add))){
                return false;
            }
            $UserId = $this->getLastId();

            ##
            //запрос добавление в таблицу addres
            $sql_add = "INSERT INTO `adress_user` 
            (company, `address`, city, country_id, region, post_code) VALUES ('$company', '$address_1', '$city', '$country_id', '$region_state', '$postcode')";

            //добавление в таблицу addres
            if(!checkStatus($this->statusRequest($sql_add))){
                return false;
            }
            $AdressUserId = $this->getLastId();
            
            ##
            // запрос на добавление в таблицу users 
            $sql_add = "INSERT INTO `users` 
            (`name`, surname, telephone, fax, users_input_id) VALUES ('$firstname', '$lastname', '$telephone', '$fax', '$UserId')";

            // добавление в таблицу users 
            if(!checkStatus($this->statusRequest($sql_add))){
                return false;
            }
            $UserInfo = $this->getLastId();


            ##
            //запрос на добавление в таблицу adress_union (объединяет таблицу адресс и тип "Payment" или "Shipping")
            $sql_add = "INSERT INTO `adress_union` 
            (adress_type_id, adress_user_id) VALUES ('$AdressType', '$AdressUserId ')";

            if(!checkStatus($this->statusRequest($sql_add))){
                return false;
            }
            $AdressUnion_id = $this->getLastId();

            ##
            //запрос на добавление в таблицу users_table (объединяет user с адрессом (оплаты) и (доставки))
            $sql_add = "INSERT INTO `users_table` 
            (users_id, adress_union_id) VALUES ('$UserInfo', '$AdressUnion_id')";

            if(!checkStatus($this->statusRequest($sql_add))){
                return false;
            }
            
            return true;

        }
        
    }
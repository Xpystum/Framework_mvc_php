<?php 

    class RegisterModel extends Model{

        public function addUser($data_post){
            // INSERT INTO `order_products` (order_id,	product_id,	count) VALUES (".$order_id.", ".$product_id.", 1)";

            $email = $data_post['email'];
            $firstname = $data_post['firstname'];
            $lastname = $data_post['lastname'];
            $telephone = $data_post['telephone'];
            $fax = $data_post['fax'];
            $company = $data_post['company'];
            $address_1 = $data_post['address_1'];
            $address_2 = $data_post['address_2'];
            $city = $data_post['city'];
            $postcode = $data_post['postcode'];
            $country_id = $data_post['country_id'];
            $region_state = $data_post['zone_id'];
            $password = password_hash($data_post['password'],PASSWORD_DEFAULT);

            $sql_add = "INSERT INTO `users`
            (email, name, surname, telephone, fax, company, adress_1, adress_2, city, post_code, country, region_state,  password)
            VALUES ('$email', '$firstname', '$lastname', '$telephone', '$fax', '$company', '$address_1', '$address_2', '$city', '$postcode', '$country_id', '$region_state'
            ,'$password') ";

            // echo $sql_add;

            return $this->statusRequest($sql_add);
        }
        
    }
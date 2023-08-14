<?php

    class ExceptionLogin extends Exception{
        private $error = null;

        public function __construct()
        {
            $this->error = [
                "errorLogin" => 'Ошибка Входа, неверный Логин или Пароль'
            ];
        }

        function get_error(){

            return $this->error;
            
            // $hash = password_hash($password, PASSWORD_DEFAULT);
            // echo $hash;

            // if(password_verify(123, $hash)){
            // 	echo "Yes";
            // }
        }

        public static function create() {
            $obj = new self;
            // some code
            return $obj;
        }
    
    }
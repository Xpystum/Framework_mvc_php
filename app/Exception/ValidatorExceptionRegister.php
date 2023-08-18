<?php

    class ValidatorExceptionRegister extends Exception{
        private $error = []; //массив ошибок (по полям)

        public function __construct()
        {
            $this->error = [
                'email' => "Введите правильную почту пример: my_site@google.com",
                'firstname' => "Имя должность содержать не меньше 2 символом и не быть длинее 30 символов",
                'lastname' => "Фамилие должность содержать не меньше 2 символом и не быть длинее 30 символов",
                'password' => "Пароль Должен быть Латиницей и не менне 6 символов, содержать Число, Заглавную букву и Спец.символ",
                'confirm' => "Не верный повтор пароля",
                'agree' => "Примите Политику",
                'company' => "Укажите Компанию",
                'address_1' => "Укажите Адресс",
                'city' => "Укажите город",
                'country_id' => "Выберите страну"
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

    
    }
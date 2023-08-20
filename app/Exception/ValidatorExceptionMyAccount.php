<?php

    class ValidatorExceptionMyAccount extends Exception{
        private $error = []; //массив ошибок (по полям)

        public function __construct()
        {
            $this->error = [
                'email' => "Введите правильную почту пример: my_site@google.com",
                'firstname' => "Имя должность содержать не меньше 2 символом и не быть длинее 30 символов",
                'lastname' => "Фамилие должность содержать не меньше 2 символом и не быть длинее 30 символов",
                'new_password' => "Пароль Должен быть Латиницей и не менне 6 символов, содержать Число, Заглавную букву и Спец.символ",
                'password' => "Неверный пароль",
                'confirm_password' => "Не верный повтор пароля",
                'company' => "Укажите Компанию",
                'address_1' => "Укажите Адресс",
                'city' => "Укажите город",
                'country_id' => "Выберите страну",
                'company_2' => "Укажите Компанию",
                'address_2' => "Укажите Адресс",
                'city_2' => "Укажите город",
                'country_id_2' => "Выберите страну"
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
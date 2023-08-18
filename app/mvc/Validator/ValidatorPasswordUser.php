<?php

    class ValidatorPasswordUser extends Validator{

        public function checkPasswordUser($value, $user){
            //$value введённый пароль
            //$user - пароль в бд

            if(password_verify($value, $user['password'])){
                if (password_needs_rehash($user['password'], PASSWORD_DEFAULT)) {
                    $newHash = password_hash($value, PASSWORD_DEFAULT);
                    $DataBase = new UserModel();
                    $DataBase->UpdatePassword($user['email'], $newHash);
                }
                return true;
            }
            return false;
        }   

        
    }
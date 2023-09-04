<?php

    class ValidatorRegister extends Validator{

        private $status = [];
        private $status_valid = false;

        #region Reg Email
        // /^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/ - регулярка email
        #endregion

        #region Reg Password
        // (?=.*[0-9])(?=.*[!@#$%^&.\\\\*\/"])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/ - пароль 
        // (?=.*[0-9]) - строка содержит хотя бы одно число;
        // (?=.*[!@#$%^&*]) - строка содержит хотя бы один спецсимвол;
        // (?=.*[a-z]) - строка содержит хотя бы одну латинскую букву в нижнем регистре;
        // (?=.*[A-Z]) - строка содержит хотя бы одну латинскую букву в верхнем регистре;
        // [0-9a-zA-Z!@#$%^&*]{6,} - строка состоит не менее, чем из 6 вышеупомянутых символов.
        #endregion

        #region Reg Name/Surname
        // ^[а-яА-Я]{30}|[a-zA-Z]{2}$ - регулярка имени
        //  /^[a-zа-яё]{1,30}$/ui - регулярка имени второй вариант (только латиница или кириллица + без символов и дефисов)
        #endregion


        public function get_status(){

            if(empty($this->status)){
                return null;
            }else{
                return $this->status;
            }
            
        }

        private function get_status_false(){
            $this->status['firstname'] = "false";
            $this->status['lastname'] = "false";
            $this->status['password'] = "false";
            $this->status['confirm'] = "false";
            $this->status['email'] = "false";   
            $this->status['agree'] = "false";
            $this->status['company'] = "false";
            $this->status['address_1'] = "false";
            $this->status['city'] = "false";
            $this->status['country_id'] = "false";
            return $this->status;
        }

        public function get_status_valid(){
            if(!empty($this->status)){
                
                foreach($this->status as $iteration){
                    if($iteration == 'false'){

                        return false;

                    }
                }
                return true;
            }
            else{
                $this->status_valid = false;
                return false;
            }
        }
        
        public function validate_register($post){
           
            try{
                
                // получаем статусы проверок от значений введёным пользователем по полям
                $this->status['firstname'] = $this->valid_name($post['firstname']);
                $this->status['lastname'] = $this->valid_surname($post['lastname']);
                $this->status['password'] = $this->valid_password($post['password']);
                $this->status['confirm'] = $this->valid_passwordReapeat($post['password'], $post['confirm']);
                $this->status['email'] = $this->valid_email($post['email']);
                $this->status['agree'] = $this->valid_politic($post);
                $this->status['company'] = $this->valid_empty($post['company']);  
                $this->status['address_1'] = $this->valid_empty($post['address_1']);
                $this->status['city'] = $this->valid_empty($post['city']);
                $this->status['country_id'] = $this->valid_empty($post['country_id']); 
                
                return $this->status;
            }
            catch (Exception){
                return $this->get_status_false();
            }
        }

        private function valid_name($value){
            $regX = '/^[a-zа-яё]{1,30}$/ui';
            $flag = $this->filter_var_validator($value,$regX);
            return $flag? "true" : "false";
        }

        private function valid_surname($value){
            $regX = '/^[a-zа-яё]{1,30}$/ui';
            $flag = $this->filter_var_validator($value,$regX);
            return $flag? "true" : "false";
        }

        private function valid_password($value){

            $regX = '/(?=.*[0-9])(?=.*[!@#$%^&.\\\\*\/"])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/';
            $flag = $this->filter_var_validator($value,$regX);
            return $flag? "true" : "false";
        }

        private function valid_passwordReapeat($pass,$pass_confirm){
          
            if($pass != null){

                if(!(strcmp($pass, $pass_confirm))){
                    return 'true';
                }
                else{
                    return 'false';
                }
            }
            return 'false';

        }   

        private function valid_email($value){
            $regX = '/^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/';
            $flag = $this->filter_var_validator($value,$regX);
            return $flag? "true" : "false";
        }

        private function valid_politic($value){
            // $value - Наш POST проверяем нажал ли пользователь на политику
            return array_key_exists("agree", $value) ? 'true' : 'false';
        }

        // если пустой возвращаем false (сделано для нашей логики)
        private function valid_empty($value){
            return empty($value)? 'false' : 'true';
        }
    }
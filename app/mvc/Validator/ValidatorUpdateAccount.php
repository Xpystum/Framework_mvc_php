<?php
    require_once("Validator.php");
    require_once("app/Helpers/AreaMyAccount.php");
    class ValidatorUpdateAccount extends Validator{

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
            
            //Пользователь
            $this->status['user']['status'] = "false";
            $this->status['user']['firstname'] = 'false';
            $this->status['user']['lastname'] = 'false';
            $this->status['user']['password'] = 'false';
            $this->status['user']['confirm'] = 'false';
            $this->status['user']['email'] = 'false';

            //Payment address
            $this->status['address_payment']['status'] = "false";
            $this->status['address_payment']['company'] = "false";
            $this->status['address_payment']['address_1'] = "false";
            $this->status['address_payment']['city'] = "false";
            $this->status['address_payment']['country_id'] = "false";

            // shipping address
            $this->status['address_shipping']['status'] = "false";
            $this->status['address_shipping']['company'] = "false";
            $this->status['address_shipping']['address_1'] = "false";
            $this->status['address_shipping']['city'] = "false";
            $this->status['address_shipping']['country_id'] = "false";

            return $this->status;
        }

        public function get_status_valid(){
           
            if(!empty($this->status)){

                $arr = ['address_shipping', 'address_payment', 'user',];
                foreach($arr as $name){
                    foreach($this->status[$name] as $key => $iteration){
                        ?> <pre> <?php //для вывода  ?> </pre>  <?php
                        if($iteration == 'false'){
                            if(($key == 'status') && ($iteration == 'false')) 
                            {   
                                break;
                            }
                            return false;
                        }
                    }
                }
                return true;
            }
            else{
                $this->status_valid = false;
                return false;
            }
        }
        
        public function validate_update($post){
           
            try{
                // var_dump($post);
                $AreaMyAccount = new AreaMyAccount($post);
                $dataArea = $AreaMyAccount->getAreaData();
                //Делаем проверки по полям (и выдаём статус изменение [status] (по которому будем) понимать обнорвлять ли данные)
                $this->valid_area_address($dataArea['address_shipping'], 'address_shipping');
                $this->valid_area_address($dataArea['address_payment'], 'address_payment');
                $this->valid_area_user($dataArea['user']);
                return $this->status;
            }
            catch (Exception){
                return $this->get_status_false();
            }
        }

        private function valid_area_user($dataAreaUser){
            //$dataAreaUser прислать юзера из AreaMyAcount <- helper
            foreach($dataAreaUser as $value){
                if(!empty($value)){
                    $dataAreaUser['user']['status'] = 'true';
                    break;
                }
                $dataAreaUser['user']['status'] = 'false';
            }

            if($dataAreaUser['user']['status']){
                $this->status['user']['status'] = 'true';
                $this->status['user']['firstname'] = $this->valid_name($dataAreaUser['firstname']);
                $this->status['user']['lastname'] = $this->valid_surname($dataAreaUser['lastname']);

                $this->status['user']['new_password'] = $this->valid_password($dataAreaUser['new_password']);
                $this->status['user']['confirm_password'] = $this->valid_passwordReapeat($dataAreaUser['new_password'], $dataAreaUser['confirm_password']);
                $this->status['user']['email'] = $this->valid_email($dataAreaUser['email']);
            }
        }


        private function valid_area_address($dataAreaAddressPayment, $nameAddress){
            //$dataAreaAddressPayment прислать данные адресс payment из AreaMyAcount <- helper
            foreach($dataAreaAddressPayment as $value){
               if(!empty($value)){
                   $dataAreaAddressPayment['status'] = 'true';
                   break;
               }
               $dataAreaAddressPayment['status'] = 'false';
           }

           if($dataAreaAddressPayment['status']){
               $this->status[$nameAddress]['status'] = $dataAreaAddressPayment['status'];
               $this->status[$nameAddress]['company'] = $this->valid_empty($dataAreaAddressPayment['company']);  
               $this->status[$nameAddress]['address'] = $this->valid_empty($dataAreaAddressPayment['address']);
               $this->status[$nameAddress]['city'] = $this->valid_empty($dataAreaAddressPayment['city']);
               $this->status[$nameAddress]['country_id'] = $this->valid_empty($dataAreaAddressPayment['country_id']); 
           }
       }

        private function valid_name($value){
            $regX = '/^[a-zа-яё]{1,30}$/ui';
            $flag = $this->filter_var_validator($value, $regX);
            return $flag? "true" : "false";
        }

        private function valid_surname($value){
            $regX = '/^[a-zа-яё]{1,30}$/ui';
            $flag = $this->filter_var_validator($value, $regX);
            return $flag? "true" : "false";
        }

        private function valid_password($value){


            if(empty($value)){
                return 'true';
            }else{
                $regX = '/(?=.*[0-9])(?=.*[!@#$%^&.\\\\*\/"])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/';
                $flag = $this->filter_var_validator($value, $regX);
                return $flag? "true" : "false";
            }
           
        }

        private function valid_passwordReapeat($pass, $pass_confirm){
            
            if(!empty($pass_confirm) && !empty($pass)){
                 
                if($pass != null){

                    if(!(strcmp($pass, $pass_confirm))){
                        return 'true';
                    }
                    else{
                        return 'false';
                    }
                }
                            
                return 'true';
            }
            elseif(empty($pass_confirm) && empty($pass)){
               return 'true';
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
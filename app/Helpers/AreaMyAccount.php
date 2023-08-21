<?php 

    //Работа с POST Из MyAccount - Form обновление 
    class AreaMyAccount{
        private $data = null;

        function __construct($POST){
            $this->splitAreaUser($POST);
            $this->splitAreaAddressPayment($POST);
            $this->splitAreaAddressShipping($POST);
        }   

        public function getAreaData(){
            return $this->data;
        }

        private function splitAreaUser($POST){
           
            $dataUser = null;
            $arr = ['firstname', 'lastname', 'new_password' , 'confirm_password', 'email', 'telephone', 'fax'];
            foreach($arr as $value){
                $dataUser[$value] = $POST[$value];
            }
            $this->data['user'] = $dataUser;
        }

        private function splitAreaAddressPayment($POST){

            $dataPayment = null;
            $arr = ['company', 'address_1', 'city' , 'country_id', 'post_code', 'zone_id'];
            foreach($arr as $value){
                if(empty($POST[$value])){
                    $dataUser[$value] = ""; 
                }
                $dataUser[$value] = $POST[$value];
            }
            $this->data['address_payment'] = $dataUser;
        }

        private function splitAreaAddressShipping($POST){

            $dataShipping = null;
            $arr = ['company_2', 'address_2', 'city_2' , 'country_id_2', 'post_code_2', 'zone_id_2'];
            foreach($arr as $value){
                if(empty($POST[$value])){
                    $dataUser[$value] = "";
                }
                $dataUser[$value] = $POST[$value];
            }
            $this->data['address_shipping'] = $dataUser;
        }


    }
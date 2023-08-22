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
            $i = 0;
            $a = 0;
            $arr = ['company', 'address_1', 'city' , 'country_id', 'post_code', 'zone_id'];
            $arr2 = ['company', 'address', 'city' , 'country_id', 'post_code', 'zone_id'];

            foreach($arr as $value){
                while($i == $a){
                    if(empty($POST[$value])){
                        $dataUser[$arr2[$i]] = ""; 
                    }
                    $dataUser[$arr2[$i]] = $POST[$value];
                    $i++;
                }
                $a++;
            }

            $this->data['address_payment'] = $dataUser;
        }

        private function splitAreaAddressShipping($POST){

            $dataShipping = null;
            $i = 0;
            $a = 0;
            $arr = ['company_2', 'address_2', 'city_2' , 'country_id_2', 'post_code_2', 'zone_id_2'];
            $arr2 = ['company', 'address', 'city' , 'country_id', 'post_code', 'zone_id'];
            foreach($arr as $value){
                while($i == $a){
                    if(empty($POST[$value])){
                        $dataUser[$arr2[$i]] = ""; 
                    }
                    $dataUser[$arr2[$i]] = $POST[$value];
                    $i++;
                }
                $a++;
            }
            $this->data['address_shipping'] = $dataUser;
        }


    }
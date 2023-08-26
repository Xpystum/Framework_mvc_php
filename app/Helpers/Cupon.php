<?php 

	class Cupon{

        public $struct = array(
            'active' => false,
            'product_id' => false
        );
		
        public function true_discont($dataCupon, $dataTovar){
          
            if(isset($dataCupon) && isset($dataTovar)){
                $flag = false;
                foreach($dataCupon as $key => $value){

                    if(($key == 'active_cupon') && ($value != 1)){
                        $this->struct['active'] = false;
                    }else{
                        $this->struct['active'] = true;
                    }   
                    
                    if( ($key == '_products_id') && ($value == $dataTovar['_product_id']) ){
                        $this->struct['product_id'] = true;
                    }
                    
                }

                if($this->struct['active'] && $this->struct['product_id']){
                    return true;
                } 
                else{
                    return false;
                } 
            }
            return null;
        }

        public function calculate_discount($price, $discount){
            $discount = (float)$discount;
           
            if(isset($price) && isset($discount)){
                $discount /= 100;
                if($discount <= 1.0){
                    $value = $price * $discount;
                    $price -= $value;
                    return $price;

                }else{
                    return "?";
                }
                return '?';
            }
            return '?';

        }
	}
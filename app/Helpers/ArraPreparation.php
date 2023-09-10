<?php 

	class ArraPreparation{
		public static function array_preparation($dataValue){

            //групировка массива
            function createThree($datas){
                $parent_arr = array();

                //[$item['parent_id']] - будет ссылкой (или индификатором родителя)
                //[[$item['id']] - номер элемента
                foreach($datas as $key => $item){
                    $parent_arr[$item['parrent_id']][$item['id']] = $item;
                }
                // работаем от главных родителей (0 уровень вложенности)
                $threeElem = $parent_arr[0];

                //передача параметра по ссылке 
                generateElemThree($threeElem, $parent_arr);

                //возваращем сгрупированный массив
                return $threeElem;
            }
            
            //рекурсивная функция
            function generateElemThree(&$threeElem, $parent_arr){

                foreach($threeElem as $key => $item){
                    //создаем ветку ['children']
                    if(!isset($item['children'])){
                        $threeElem[$key]['children'] = array();
                    }

                    //записываем производный массив от родителя в ['children'] - если такой есть и запускаем рекурсию по этому children
                    if(array_key_exists($key, $parent_arr)){
                        $threeElem[$key]['children'] = $parent_arr[$key];
                        generateElemThree($threeElem[$key]['children'], $parent_arr);
                    }
                }

            }

            return createThree($dataValue);
		}
	}
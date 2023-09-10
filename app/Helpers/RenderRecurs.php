<?php 

	class renderRecursView{

		public static function renderTemplate($path, $arr){
		
			$output = '';

            if(file_exists($path)){
                extract($arr); 

                ob_start();
                include $path;
                $output = ob_get_clean();
            }
            return $output;
		}

	}
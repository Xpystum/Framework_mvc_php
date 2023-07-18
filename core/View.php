<?php 

    class View
    {
        
        public $nameLayout = 'default'; //Общий шаблон по умолчанию
        public $content_file = ""; // виды отображающие контент страниц;
        public $widgets = []; // виджеты
        public $data = null; //массив, содержащий элементы контента страницы.


        public function generate($pathFile, $data, $nameLayout, $widgets){

          $page = 'Views/pages/'.$pathFile.'.php';
          include_once('Views/layouts/'.$nameLayout.'.php');
		    }
    }
    
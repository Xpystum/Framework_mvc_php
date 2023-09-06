<?php 

	class Widget{
		// виджеты могут работать с базой
		//* ps можно было конечно сделать что бы виджеты работали с базой "$data" (которая приходит из контроллера) - Пришлось бы писать ещё класс для работы widget + base
		static public function pathIncludeView($file_name, $data = null){

			include("app/mvc/Views/widgets/".$file_name.".php");
		}
	}
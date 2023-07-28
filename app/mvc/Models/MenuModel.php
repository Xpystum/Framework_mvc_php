<?php 
	require_once("Model.php");

	class MenuModel extends Model{

		public function selectItems($alias){


			$sql = "SELECT 
						menu.id as id, 
						alias, 
						menu_items.id as menu_items_id, 
						href, 
						name, 
						menu_id, 
						parrent_id, 
						img, 
						icon
					FROM menu INNER JOIN menu_items ON menu.id = menu_items.menu_id 
					WHERE alias = '".$alias."'
			";

			$data = $this->getMultyData($sql);
			return $data;
		}

	}
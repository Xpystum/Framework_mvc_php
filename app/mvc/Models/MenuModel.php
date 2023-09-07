<?php 
	require_once("app/core/Model.php");

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

		public function selectItemsParent($alias){
			$sql = "SELECT 
			menu.id as id_menu, 
			alias, 
			menu_items.id as menu_items_id, 
			href, 
			name, 
			menu_id, 
			parrent_id, 
			img, 
			icon
			FROM menu INNER JOIN menu_items ON menu.id = menu_items.menu_id 
			WHERE alias = $alias AND parrent_id IS NULL";

			$data = $this->getMultyData($sql);
			return $data;
		}

		public function selectItemMenuParant($alias){
			$sql = "SELECT 

			m_parant.name as parant_name ,
			m.name as name, 
			m.is_title as title,
			m.img as img, 
			m.icon as icon

			FROM menu_items as m 
				LEFT JOIN menu_items as m_parant 
				ON m.parrent_id = m_parant.id 
			WHERE m.menu_id = (SELECT id FROM `menu` WHERE alias = '$alias');";

			$data = $this->getMultyData($sql);
			return $data;
		}


		public function selectFullMenuParant($alias){
			$sql = "SELECT 

			id,
			parrent_id,
			`name`,
			is_title as title,
			img as img, 
			icon as icon
			
			FROM menu_items
			WHERE menu_id = (SELECT id FROM `menu` WHERE alias = '$alias');";

			$data = $this->getMultyData($sql);
			return $data;
		}

	}
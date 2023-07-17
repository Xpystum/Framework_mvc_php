<?php 
	require_once("config.php");

	class Model{

		protected function connect(){
			$link = mysqli_connect(HOST, USER, PASSWORD, DB);

			if(!$link){
				die("error connect");
			}

			return $link;
		}

		protected function getData($sql){
			$result = mysqli_query($this->connect(), $sql);
			$data = null;

			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			    $data = $row;
			}
			return $data;
		}

		protected function statusRequest($sql){
			$result = mysqli_query($this->connect(), $sql);
			return $result;
		}

		protected function getMultyData($sql){
			$result = mysqli_query($this->connect(), $sql);

			$data = [];

			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			    $data[] = $row;
			}
			return $data;
		}

	}
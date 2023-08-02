<?php 
	require_once("config.php");
	require_once("Interface/SingltoneInterface.php");

	class Model implements SingltoneInterface{

	    private static $instance = null; //SingleTon
		private static $link = null; // Переиспользование нашего подключение (статик нужно для того что бы задавать link прямо в instance() )


		#region (Magic method)

		public function __construct()
		{
			$this->link = $this->connect();
		}

		public function __clone()
		{
			trigger_error('Class could not be cloned', \E_USER_ERROR);
		}
	
		public function __wakeup()
		{   
			trigger_error('Class could not be deserialized', \E_USER_ERROR);
		}

		#endregion
	
		#region (logic Singletone)
	
		public static function instance()
		{
			if(self::$instance === null){
				self::$link = self::connect();
				self::$instance = new self;
			}
			return self::$instance;
		}
	
		private static function connect(){
		
			self::$link = mysqli_connect(HOST, USER, PASSWORD, DB); //из конфинга
	
			if(!self::$link){
				die("error connect");
			}
	
			return self::$link;
		}

		#endregion
	
		#region (Logic Model)

		protected function getData($sql){
			
			$result = mysqli_query(self::$link, $sql);
			$data = null;
	
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$data = $row;
			}
			return $data;
		}

		protected function statusRequest($sql){
			$result = mysqli_query($this->link, $sql);
			return $result;
		}

		protected function getMultyData($sql){
			$result = mysqli_query($this->link, $sql);
			$data = [];

			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			    $data[] = $row;
			}
			return $data;
		}

		#endregion

	

	}
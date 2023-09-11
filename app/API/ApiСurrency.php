<?php 

	class ApiСurrency{

		private static function CBR_XML_Daily_Rus_class(){

			static $rates;
			
			if ($rates === null) {
				$rates = json_decode(file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js'));
			}
			
			return $rates;
		}

		public static function returnСurrencyFromRuble($current = 'USD')
		{
			
			$data = self::CBR_XML_Daily_Rus_class();
			
			return $data->Valute->$current->Value;
		}

		

	}
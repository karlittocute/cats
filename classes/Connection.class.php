<?php
	class Connection {
		
//		public static $user;
//		public static $password;
		public static $user='root';
		public static $password='';
		public static $port;
		public static $host;
		public static $database ='cat';
		public static $connection;
		//$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);  
		public  static $dsn;
		//self::$dsn ="mysql:host=" . self::$host . ";database=" . self::$database;
		//методы : подключение к БД 
		
		public static function connect() {
			
			try {
			//	self::$dbh=new PDO($dsn, self::$user, self::$password);
				self::$connection=new PDO("mysql:host=localhost;dbname=cat", self::$user, self::$password);
				return true;
			}
			catch (PDOExeption $e){
				echo '<br>Не удалось установить соединения с базой данных: ' .$e->getMessage()."</br>";
				
			}
		}
		
		//уничтожение подключения 
		
		public function dsd () {
			echo "destruct";
		}
		private function __construct(){  //для создания синглтона 
		
		}
		private function __clone(){  //для создания синглтона 
		
		}
		private function __wakeup(){  //для создания синглтона 
		
		}
		
		public static function getInstance(){
			//проверяем содержится ли в переменной $conntction 
			//handler (коннектор для рабоы с бд)
			if (empty(self::$connection)) {
				//если переменная $connection пуста (null), то мы создаем подключение 
				self::$connection = new self();// /new connection 
			}
			return self::$connection;// если объект класса instance есть , то просто его его вернуть 
		}
		
		
	}
?>
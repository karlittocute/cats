<?php
	class Users {
		
		
		public static function singIn() {
			try {
				if (!empty($_POST['login']) && !empty($_POST['password']))
				{
					$login = $_POST['login'];
					$password  = md5($_POST['password']);
					
					$query = "SELECT * FROM users WHERE login='$login' ";
					$result=Connection::getInstance()->query($query);
					while($row=$result->fetch()){
						if ($row[2]==$password) {
							$_SESSION['name'] =$row[3];
							$_SESSION['rights'] =$row[4];
							$name=$_SESSION['name'];
							echo "Hello, $name ^^";
						}
						
					}
					if (empty($_SESSION['name'])) { echo "Неверный логин или пароль";}
				}
				return true;
				}
			catch (PDOExeption $e){
				echo '<br>Не удалось получить значения из базы данных: ' .$e->getMessage()."</br>";
				
			}
		}
		
		
		private function __construct(){  
		
		}
		private function __clone(){  
		
		}
		private function __wakeup(){  
		
		}
	}
?>
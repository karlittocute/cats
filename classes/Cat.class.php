<?php
	class Cat {
		public static $result;
		
		public static function showAll() {
			try {
				echo "<table class='table table-striped'><tr>  <th>ID</th>  <th>Cat's name</th>  <th>Breed</th>  <th>Year of birth</th>  <th></th> <th></th> </tr>";
				self::$result=Connection::getInstance()->query("SELECT * FROM `cats` ");
				while($row=self::$result->fetch()){
					echo " <tr>";
					echo "<td>". $row[0]."   " . "</td>";
					echo "<td>". $row[1]."   " . "</td>";
					echo "<td>". $row[2]."   " . "</td>";
					echo "<td>". $row[3]."   " . "</td>";
					echo "<td><form action='deleteRecord.php' method='post'> <input  type='hidden'  name='id' value='$row[0]' /><button type='submit' class='btn btn-default'>Delete record</button></form></td>";
					echo "<td><form action='updateForm.php' method='post'> <input  type='hidden'  name='id' value='$row[0]' /><button type='submit' class='btn btn-default'>Update record</button></form></td>";
					echo "</tr>";
				}
				echo "</table>";
				return true;
			}
			catch (PDOExeption $e){
				echo '<br>Не удалось получить значения из базы данных: ' .$e->getMessage()."</br>";
				
			}
		}
		
		
		public static function addRecord() {
			try {
				if (!empty($_POST['name']) && !empty($_POST['breed']) && !empty($_POST['year']))
				{
					$name = htmlspecialchars($_POST['name']);
					$breed  =htmlspecialchars( $_POST['breed']);
					$year = htmlspecialchars($_POST['year']);
					$query = "INSERT INTO cats VALUES" . "('','$name', '$breed', '$year')";
					$res = Connection::getInstance()->exec($query);
				}
			}
			catch (PDOExeption $e){
				echo '<br>Не удалось добавить  значения в базу данных: ' .$e->getMessage()."</br>";
			}
		}
		
		
		public static function deleteRecord() {
			try {
				if (!empty($_POST['id']))
				{
					$id = $_POST['id'];
					$query = "DELETE FROM cats WHERE id='$id'";
					$res = Connection::getInstance()->exec($query);
				}
				
			}
			catch (PDOExeption $e){
				echo '<br>Не удалось добавить  значения в базу данных: ' .$e->getMessage()."</br>";
			}
		}
		
		public static function updateRecord() {
			try {
				if (!empty($_POST['name']) && !empty($_POST['breed']) && !empty($_POST['year'])&& !empty($_POST['id']) )
				{
					$name = $_POST['name'];
					$breed  = $_POST['breed'];
					$year = $_POST['year'];
					$id = $_POST['id'];
					$query = "UPDATE cats SET name='$name', breed='$breed', yearOfBirth='$year' WHERE id='$id'";
					$res = Connection::getInstance()->exec($query);
				}
			}
			catch (PDOExeption $e){
				echo '<br>Не удалось добавить  значения в базу данных: ' .$e->getMessage()."</br>";
			
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
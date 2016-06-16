<?php
	class Cat {
		public static $result;
		public static $delete;
		public static $add;
		public static $update;

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
					echo "<td><form action='updateForm.php' method='post'> <input  type='hidden'  name='id' value='$row[0]' /><input  type='hidden'  name='name' value='$row[1]' /><input  type='hidden'  name='breed' value='$row[2]' /><input  type='hidden'  name='year' value='$row[3]' /><button type='submit' class='btn btn-default'>Update record</button></form></td>";
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
				self::$add=Connection::getInstance()->prepare("INSERT INTO cats VALUES" . "('',:name, :breed, :year)");
				if (!empty($_POST['name']) && !empty($_POST['breed']) && !empty($_POST['year']))
				{
					$name = $_POST['name'];
					$breed  = $_POST['breed'];
					$year = $_POST['year'];
					self::$add->bindvalue(':name',$name);
					self::$add->bindvalue(':breed',$breed);
					self::$add->bindvalue(':year',$year);
					self::$add->execute();
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
					self::$delete=Connection::getInstance()->prepare("DELETE FROM cats WHERE id=:id");
					$id = $_POST['id'];
					self::$delete->bindvalue(':id',$id);
					self::$delete->execute();
					/*
					$query = "DELETE FROM cats WHERE id='$id'";
					$res = Connection::getInstance()->exec($query);
					*/
				}
				
			}
			catch (PDOExeption $e){
				echo '<br>Не удалось добавить  значения в базу данных: ' .$e->getMessage()."</br>";
			}
		}
		
		public static function updateRecord() {
			try {
				self::$update=Connection::getInstance()->prepare("UPDATE cats SET name=:name, breed=:breed, yearOfBirth=:year WHERE id=:id");
				if (!empty($_POST['name']) && !empty($_POST['breed']) && !empty($_POST['year'])&& !empty($_POST['id']) )
				{
					$name = $_POST['name'];
					$breed  = $_POST['breed'];
					$year = $_POST['year'];
					$id = $_POST['id'];
					self::$update->bindvalue(':name',$name);
					self::$update->bindvalue(':breed',$breed);
					self::$update->bindvalue(':year',$year);
					self::$update->bindvalue(':id',$id);
					self::$update->execute();
					
					$query = "UPDATE cats SET name=:name, breed=:breed, yearOfBirth=:year WHERE id=:id";
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
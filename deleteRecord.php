<?php  session_start();
	if($_SESSION['rights']==1){
		include_once "config/settings.php";
		include_once "classes/Connection.class.php";
		include_once "classes/Cat.class.php";
		Connection::connect();
		if (Connection::$connection !== null) {}
		else 
			echo "Проблемы с подключением ";
		Cat::deleteRecord();
		include 'database.php';  
	}
	else {
		include 'page1.php';  
		echo "No rights :c ";
		include 'page2.php'; 
		
	}	

?>


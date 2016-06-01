<?php session_start(); 
include 'page1.php';  
	include_once "config/settings.php";
	include_once "classes/Connection.class.php";
	include_once "classes/Users.class.php";
    Connection::connect();
	if (Connection::$connection !== null) {}
	else 
		echo "Проблемы с подключением ";
	Users::singIn();
?>



<?php include 'page2.php';  ?>
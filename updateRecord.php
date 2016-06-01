<?php 
	include_once "config/settings.php";
	include_once "classes/Connection.class.php";
	include_once "classes/Cat.class.php";
	Connection::connect();
	if (Connection::$connection !== null) {}
	else 
		echo "Проблемы с подключением ";
	Cat::updateRecord();
    include 'database.php';  
?>


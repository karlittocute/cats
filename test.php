<?php 
	include_once "config/settings.php";
	include_once "classes/Connection.class.php";
	Connection::getInstance();
	if (Connection::$connection !== null) {
		echo "Все хорошо!";
	}
	else 
		echo "Все плохо!";
	echo 	(htmlspecialchars("!@#$%^&*))(*)(*<><><>dfsdfsdf"));

	
?>
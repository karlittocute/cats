<?php
include 'page1.php';  ?>
<?php
	include_once "config/settings.php";
	include_once "classes/Connection.class.php";
	include_once "classes/Cat.class.php";
	Connection::connect();
	if (Connection::$connection !== null) {}
	else 
		echo "Проблемы с подключением ";
	Cat::showAll();
?>	
<a class="btn btn-default" href="addForm.php" role="button">Add record</a>

<?php include 'page2.php';  ?>
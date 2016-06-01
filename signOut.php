<?php session_start();
 unset($_SESSION['name']);   
 session_destroy();  
 include 'page1.php';  

?>
Goodbye :)
<?php include 'page2.php';  ?>
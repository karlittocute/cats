<?php
session_start(); 
?>
<head>

</head>
<body>


<form name="reg" action="formcaptcha.php" method="post">
 

 
	<img src = "captcha.php" />
	</br></br>
	<input type = "text" name = "capctha" />
	</br></br>
	<input type = "submit" value = "Check" />
 
</form>
<?php
if (empty($_POST['capctha'])){}
else {
if($_POST['capctha'] != $_SESSION['rand_code']) echo "NO";
 
else echo "YES";

}
 
?>
</body>
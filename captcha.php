<?php
  header("Content-type: image/png"); // ��������� ��� ��������
session_start();
 
$string = "";
 
for ($i = 0; $i < 6; $i++) // ����� �������� ���������� �������� �� ��������
 
$string .= chr(rand(97, 122)); // ����� ��������� �������� �� a �� z, �� html ����
 
$_SESSION['rand_code'] = $string; // ������� ������, � ������� ����� ��������� ������������ �������
 
$dir = "fonts/"; // ���������� ����� �� �������
$dircap="captcha.png" ;
$image = imagecreatefrompng($dircap); // ������ ����������� ��������


 
 
$color = imagecolorallocate($image, 200, 180, 90); // ���� �������� �� ��������
 
 
imagettftext ($image, 35, 5, 7, 55, $color, $dir."Mateur.ttf", $_SESSION['rand_code']); // ��������� ����� �� ����������� � �������������� ������� TrueType, � ��� �� ��������� ������� � ������ ������
 

 


imagepng($image);


 
?>
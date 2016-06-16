<?php
  header("Content-type: image/png"); // объ€вл€ем тип страницы
session_start();
 
$string = "";
 
for ($i = 0; $i < 6; $i++) // «десь задаетс€ количество символов на картинке
 
$string .= chr(rand(97, 122)); // вывод случайных символов от a до z, по html коду
 
$_SESSION['rand_code'] = $string; // создаем сессию, в которой будут хранитьс€ отображаемые символы
 
$dir = "fonts/"; // подключаем папку со шрифтом
$dircap="captcha.png" ;
$image = imagecreatefrompng($dircap); // размер создаваемой картинки


 
 
$color = imagecolorallocate($image, 200, 180, 90); // ÷вет символов на картинке
 
 
imagettftext ($image, 35, 5, 7, 55, $color, $dir."Mateur.ttf", $_SESSION['rand_code']); // добавл€ем текст на изображение с использованием шрифтов TrueType, а так же сохран€ем символы в данной сессии
 

 


imagepng($image);


 
?>
<?php // sqltest.php   u165255793_
require_once 'login.php';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);  
if (!$conn) die("Невозможно подключиться к MySQL: " .  $conn->errorInfo());

echo  <<<_END
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
_END;
echo '<div class="container-fluid">';



if (isset($_POST['delete']) && isset($_POST['id']))
{
    $id       = $_POST['id'];
    $query = "DELETE FROM cars WHERE id='$id'";
	$res	=$conn->exec($query);
    if (!$res)
 echo "Сбой при удалении данных: $query<br />" .
          $conn->errorInfo() . "<br /><br />";
}

if (isset($_POST['change']) && isset($_POST['id']))
{
    $id       = $_POST['id'];
    $mark     = $_POST['mark1'];
	$year   = $_POST['year1'];
    $price    = $_POST['price1'];
    $state = $_POST['state1'];

    $query = "UPDATE cars SET mark='$mark', year='$year', price='$price', state='$state' WHERE id='$id'";
	$res	=$conn->exec($query);
    if (!$res)
 "Сбой при удалении данных: $query<br />" .
           $conn->errorInfo() . "<br /><br />";	  

}



if (isset($_POST['mark']) &&
    isset($_POST['year']) &&
    isset($_POST['price']) &&
    isset($_POST['state']))
{
    $mark     = $_POST['mark'];
	$year   = $_POST['year'];
    $price    = $_POST['price'];
    $state = $_POST['state'];
    $query = "INSERT INTO cars VALUES" . "('','$mark', '$year', '$price', '$state')";
	$res	=$conn->exec($query);
    if (!$res)
        echo "Сбой при вставке данных: $query<br />" .
        $conn->errorInfo() . "<br /><br />";
		}
echo <<<_END

 <script>
   function showForm() {
    document.getElementById("records").hidden = false;
   }
   function hideForm() {
    document.getElementById("records").hidden = true;
   }
  </script>

<form action="sqltest.php " method="post"><pre><h5><div class="form-group">
 <label >Mark </label><input type="text" name="mark"  class="form-control input-sm" />
 <label >Year  </label> <input type="text" name="year" class="form-control input-sm"/>
 <label >Price  </label><input type="text" name="price" class="form-control input-sm"/>
 <label >State  </label>    <input type="text" name="state" class="form-control input-sm"/>
 <input type="submit" class="btn btn-default" value="ADD RECORD" /> 
</div></h5></pre></form>
_END;
/*
echo <<<_END
<form action="sqltest.php" method="post">
<input type="text" name="search"  class="form-control input-sm" />
<button type="submit" class="btn btn-default">SEARCH</button></br>
_END;


if (isset($_POST['search']))
{
$search=$_POST['search'];
$query="SELECT * FROM books where author like '%$search%' or title like '%$search%' or year like '%$search%'  or isbn like '%$search%'   or category like '%$search%'";
$res = $conn->query( $query);
$row = $res->fetch(PDO::FETCH_NUM);
if (empty($row[0])){echo "<h5>Nothing found</h5>";};
while ($row = $res->fetch(PDO::FETCH_NUM)){

echo "<h5>".$row[1]."</br>";
echo $row[2]."</br>";
echo $row[3]."</br>";
echo $row[4]."</br>";
echo $row[5]."</br></br></h5>";
};
    if (!$res)
 echo "Сбой при удалении данных: $query<br />" .
          $conn->errorInfo() . "<br /><br />";
}

*/
echo <<<_END
</form>


<button id="show" onclick="showForm()"  class="btn btn-default">SHOW ALL RECORDS</button>
<button  id="hide"  onclick="hideForm()"  class="btn btn-default">HIDE ALL RECORDS</button>
<div hidden  id="records">
_END;


$res = $conn->query('SELECT * FROM cars');
while ($row = $res->fetch(PDO::FETCH_NUM)){

    echo <<<_END

	
	
	
	
<form action="sqltest.php" method="post" ><pre><h5><div class="form-group">
 <label >Mark </label><input type="text" name="mark1" value="$row[1]" class="form-control input-sm"/>
 <label >Year  </label><input type="text" name="year1" value="$row[2]" class="form-control input-sm"/>
 <label >Price   </label><input type="text" name="price1" value="$row[3]" class="form-control input-sm"/>
 <label >State  </label>  <input type="text" name="state1" value="$row[4]" class="form-control input-sm"/>
 <input  type="hidden"  name="id" value="$row[0]" />
 <label >DELETE RECORD  </label ><input type="checkbox" name="delete"  />
 <label >CHANGE RECORD  </label ><input type="checkbox" name="change"  />
<input type="submit" class="btn btn-default" value="MAKE CHANGES" />
</div></h5></pre>

</form>  

_END;
}


echo '</div></div>';
?>
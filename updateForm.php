<?php session_start();
include 'page1.php';  
	
	if($_SESSION['rights']==1){
	$id=$_POST['id'];
	$name=$_POST['name'];
	$breed=$_POST['breed'];
	$year=$_POST['year'];
	echo  <<<_END
	
	 </br></br></br>
	<form action="updateRecord.php" method="post">
	
		<div class="form-group">
			<input  type='hidden'  name='id' value='$id' />
			<label>Сat's name</label>
			<input  name="name" value='$name' class="form-control" >
		</div>
		<div class="form-group">
			<label>Breed</label>
			<input name="breed" value='$breed' class="form-control" >
		</div>
		<div class="form-group">
			<label>Year of birth</label>
			<input  name="year" value='$year' class="form-control" >
		</div>


		<button type="submit" class="btn btn-default">update record</button>
    </form>

_END;
	}	
	else {echo "No rights :c ";}
	?>
<?php include 'page2.php';  ?>
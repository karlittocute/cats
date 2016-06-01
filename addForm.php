<?php session_start();
include 'page1.php';  
	if(($_SESSION['rights']==1)){
	echo  <<<_END

    </br></br></br>
	<form action="addRecord.php" method="post">
		<div class="form-group">
			<label>Сat's name</label>
			<input  name="name" class="form-control" >
		</div>
		<div class="form-group">
			<label>Breed</label>
			<input name="breed" class="form-control" >
		</div>
		<div class="form-group">
			<label>Year of birth</label>
			<input  name="year" class="form-control" >
		</div>


		<button type="submit" class="btn btn-default">Add record</button>
</form>

_END;
	}
	else  {echo "No rights :c ";}
	
	
	?>

<?php include 'page2.php';  ?>
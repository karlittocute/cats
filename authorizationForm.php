<?php session_start(); 
include 'page1.php';  ?>
</br></br></br>
<form action="authorization.php" method="post">
		<div class="form-group">
			<label>Login</label>
			<input  name="login" class="form-control" >
		</div>
		<div class="form-group">
			<label>Password</label>
			<input  type="password" name="password" class="form-control" >
		</div>
		<button type="submit" class="btn btn-default">Sign in </button>
</form>



<?php include 'page2.php';  ?>
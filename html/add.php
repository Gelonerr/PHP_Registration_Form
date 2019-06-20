<?php
//connection
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'db');
	/* Attempt to connect to MySQL database */
	$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
	// Check connection
	if($conn === false){
		die("ERROR: Could not connect.". mysqli_connect_error());
	}
//add
if(isset($_POST['save']))
{	 
	 $name = $_POST['Name'];
	 $reg_code = $_POST['Reg'];
	 $email = $_POST['Em'];
	 $phone = $_POST['Ph'];
	 $comment = $_POST['Commn'];
	 /*sql query for inserting data into database*/
	 mysqli_query($conn,"insert into companies(name,registration_code,email,phone,comm) 
	 values ('$name','$reg_code','$email','$phone','$comment')") or die(mysqli_error());
	 echo "<p align=center>Data Added Successfully.</p>";
}
?>	
<!DOCTYPE html>
<html lang="en">  
<html>
<head>
	<title>Add company</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<div class="container" style="width:900px;">
	<div class="simple-login-container">
		<h2>Company registration form</h2>
		<form method="post" action="">
			<div class="row">
				<div class="col-md-12 form-group">
					<input type="text" class="form-control" placeholder="Name" name="Name" required>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 form-group">
					<input type="text" class="form-control" placeholder="Registration code" name="Reg" required>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 form-group">
					<input type="text" class="form-control" placeholder="Email" name="Em" required>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 form-group">
					<input type="text" class="form-control" placeholder="Phone" name="Ph" required>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 form-group">
					<input type="text" class="form-control" placeholder="Comment" name="Commn">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 form-group">
					<p align="center"><button type="submit" class="btn btn-success" name="save">Add</button></p>
				</div>
			</div>
		</form>
	<form method="post" action="index.php">
		<input type="submit" name="export" value="RETURN" class="btn btn-success"> 
	</form>
	</div>
	</div>
</body>
</html>
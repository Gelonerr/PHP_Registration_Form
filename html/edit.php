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
//Update
if(count($_POST)>0){
	$id = $_GET['id'];
	mysqli_query($conn,"UPDATE companies set name='" . $_POST['Name'] . "', registration_code='" . $_POST['Reg'] . "', email='" . $_POST['Em'] . "' ,phone='" . $_POST['Ph'] ."' ,comm='" . $_POST['Commn'] . "' WHERE id='" . $_GET['id'] . "'");
	echo "<p align=center>Record Modified Successfully.</p>";
}
$result = mysqli_query($conn,"SELECT * FROM companies WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">  
<html>
<head>
	<title>Update company information</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<div class="container" style="width:900px;">
	<div class="simple-login-container">
		<h2>Company information</h2>
		<form method="post" action="">
			<div class="row">
				<div class="col-md-12 form-group">
					<input type="text" class="form-control" name="Name" value="<?php echo $row["name"];?>" required>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 form-group">
					<input type="text" class="form-control" name="Reg" value="<?php echo $row["registration_code"];?>" required>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 form-group">
					<input type="text" class="form-control" name="Em" value="<?php echo $row["email"];?>" required>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 form-group">
					<input type="text" class="form-control" name="Ph" value="<?php echo $row["phone"];?>" required>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 form-group">
					<input type="text" class="form-control" name="Commn" value="<?php echo $row["comm"];?>" required>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 form-group">
					<p align="center"><button type="submit" class="btn btn-success" name="update">Update</button></p>
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
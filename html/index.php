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
//delete selected
	if(isset($_POST['delete'])){
		$checkbox = $_POST['check'];
		for($i=0;$i<count($checkbox);$i++){
		$del_id = $checkbox[$i]; 
		mysqli_query($conn,"DELETE FROM companies WHERE id='".$del_id."'");
		}
	}
	$result = mysqli_query($conn,"SELECT * FROM companies");
?>	
<!DOCTYPE html>
<html lang="en">  
<head>
	<title>Companies register</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<div><?php if(isset($message)) { echo $message; } ?></div>
		<br/><br/>
		<div class="container" style="width:900px;">
			<h2 align="center">List of registered companies</h2>	               
            <br/>				
            <div class="table-responsive">
			<form method="post" action="">
			<table class="table table-bordered">
			<thead>
				<tr>
					<th width="5%"><input type="checkbox" id="checkAl">All</th>
					<th width="5%">ID</th>
					<th width="25%">Name</th>
					<th width="15%">Registration code</th>
					<th width="10%">Email</th>
					<th width="20%">Phone</th>
					<th width="5%">Comment</th>
					<th width="5%">Action</th>
				</tr>
			</thead>
			<?php
				$i=0;
				while($row = mysqli_fetch_array($result)) {
					if($i%2==0)
					$classname="even";
					else
					$classname="odd";
			?>
				<tr>
					<td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["id"]; ?>"></td>
					<td><?php echo $row["id"]; ?></td>
					<td><?php echo $row["name"]; ?></td>
					<td><?php echo $row["registration_code"];?></td>
					<td><?php echo $row["email"]; ?></td>
					<td><?php echo $row["phone"]; ?></td>
					<td><?php echo $row["comm"]; ?></td>
					<td><a class="btn btn-success" name="update" href="edit.php?id=<?php echo $row["id"]; ?>">Update</a></td>
					<tr class="<?php if(isset($classname)) echo $classname;?>">
				</tr>
				<?php
					$i++;
				}
				?>
			</table>
			<button type="submit" class="btn btn-success" name="delete">DELETE</button>
			</form>
			<br/>
			<form method="post" action="add.php">
				<input type="submit" name="export" value="ADD" class="btn btn-success"> 
			</form>
		   </div>
           </div>
</body>
<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>	  
 </html>  
<?php 



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >

</head>
<body>
	<div class="container">
	<div class="row">
		<div class="col-lg-3" >ID</div>
		<div class="col-lg-3">Name</div>
		<div class="col-lg-3">Award</div>
		<div class="col-lg-3">Date</div>
	</div>
	<?php 
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="test";
	$conn=new mysqli($servername,$username,$password,$dbname);
	if ($conn->connect_error) {
		die("connect failed:".$conn->connect_error);
	}
	$aid=1;
	$sql=("CALL `getAuthor`();");
	$stmt=$conn->query($sql);
	while ($row=mysqli_fetch_assoc($stmt)){	
	?>
	<div class="row">
		<div class="col-lg-3" ><?php echo $row['ID'] ?></div>
		<div class="col-lg-3"><?php echo $row['name'] ?></div>
		<div class="col-lg-3"><?php echo $row['award'] ?></div>
		<div class="col-lg-3"><?php echo $row['create_date'] ?></div>
	</div>
	<?php }	 ?>
</div>
	<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
 ?>
<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
	<link rel="stylesheet" type="text/css" href="C:\xampp\htdocs\a.css">

<head>
	<title></title>
</head>
<body>
  <form method="POST">
   <h1 align="center">Danh sách hàng</h1>
 	<?php 
$username="root";
$servername="localhost";
$password="";
$dbname="user";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}
$display_number=$_GET['display']? $_GET['display']:12;
$current_page=$_GET['page']? $_GET['page']:1;
$start=($current_page-1)*$display_number;
      $sql="SELECT * from product limit $start,$display_number ";
  $result = $conn->query($sql);


 	while($data=mysqli_fetch_array($result)){
?> 		

        <div class="col-lg-4">
              <p><?php echo $data["ProductName"]; ?></p>
              <p><img src='<?php echo $data["Image"]; ?>'/></p>
               <p><?php echo $data["Price"]; ?>VND</p>
                           <p><a href="productdetail.php?id=<?= $data["ProductID"] ?>"><button type="button" class="btn btn-warning">Chi Tiết</button></a></p>
 
        </div>
      
      <?php 
}
       ?>
     </form>
<nav aria-label="Page navigation">
  <ul class="pagination">
    <li ><a href="page.php" name="display">1</a></li>
    <li><a href="page.php" name="display">2</a></li>
  </ul>
</nav>
<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
			<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
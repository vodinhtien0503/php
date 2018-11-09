
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >

 </head>
 <body>
 <h1>Danh sách sản phẩm</h1>
 <?php 
$servername="localhost";
$username="root";
$password="";
$dbname="user";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("connection failed".$conn->connect_error);
}
$sql=("SELECT * from product")or die(mysql_error());
$result=$conn->query($sql);
while($data=mysqli_fetch_array($result)){

  ?>
	<div class="col-lg-4">
		<p><?php echo $data['ProductName'] ?></p>
		<p><img src="<?php echo $data['Image'] ?>"></p>
		<p><?php echo $data['Price'] ?> VNĐ</p>
		<a href="chitiet.php?id=<?=$data['ProductID']?>"><p><input type="button" name="bt1" class="btn-warning" value="Chi Tiết"></p></a>

	</div>

<?php 
}
 ?>
<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
			<script src="bootstrap/js/bootstrap.min.js"></script>
 </body>
 </html>
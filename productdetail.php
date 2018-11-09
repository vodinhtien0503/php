<?php 
session_start();
session_status();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<?php  
 		$id=isset($_GET['id'])?(int)$_GET['id']:'';
	//echo $id;
	$username="root";
	$servername="localhost";
	$password="";
	$dbname="user";
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	 			$sql="SELECT * from product where ProductID=$id ";
	 	$result = $conn->query($sql);
	 	while($data=mysqli_fetch_array($result)){	
?>
<?php if(isset($_SESSION['success'])) :?>

      <p class="text-danger"><?= $_SESSION['success']?></p>
      <?php endif; unset($_SESSION['success']) ?>
<div class="col-lg-6"><img src="<?php echo $data['Image'] ?>"></img></div>
<div class="col-lg-6"><p><?php echo $data['ProductName'] ?></p>
<a href="/list-cart.php"><button type="button" class="btn btn-primary">Mua</button></a>
</div>
<?php 


	if (isset($_SESSION['cart'])) {
		if (isset($_SESSION['cart'][$id])) {
				$_SESSION['cart'][$id]['ProductDescipition']+=1;

		}else{
		$_SESSION['cart'][$id]['ProductDescipition']=1;

		}
				$_SESSION['cart'][$id]['ProductName']=$data['ProductName'];
				$_SESSION['cart'][$id]['Image']=$data['Image'];
				$_SESSION['cart'][$id]['Price']=$data['Price'];

		$_SESSION['success']='Tồn tại giỏ hàng!! Cập nhập ok';
		header("/productdetail.php");exit();
	}
	else{
		$_SESSION['cart'][$id]['ProductDescipition']=1;
			$_SESSION['cart'][$id]['ProductName']=$data['ProductName'];
			$_SESSION['cart'][$id]['Image']=$data['Image'];
			$_SESSION['cart'][$id]['Price']=$data['Price'];

		$_SESSION['success']='Tạo giỏ hàng thành công';
	header("/productdetail.php");exit();
	}
}
$conn->close();
 ?>
  
 </body>
 </html>
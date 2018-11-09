
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
	<?php 
	 session_start();
	 $item=0;
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
	echo "<pre/>"; 		
	var_dump($data); 

	 	}
	 	
	if (isset($_SESSION['cart'])) {
		if (isset($_SESSION['cart'][$id])) {
				$_SESSION['cart'][$id][$item]+=1;

		}else{
		$_SESSION['cart'][$id][$item]=1;

		}
				$_SESSION['cart'][$id]['name']=$data['name'];
		$_SESSION['success']='Tồn tại giỏ hàng!! Cập nhập ok';
		header("/danhsach.php");exit();
	}
	else{
		$_SESSION['cart'][$id][$item]=1;
			$_SESSION['cart'][$id]['name']=$data['name'];
		$_SESSION['success']='Tạo giỏ hàng thành công';
		header("/danhsach.php");exit();
	}

	 		?>
	 		


	 
	</body>
	</html>
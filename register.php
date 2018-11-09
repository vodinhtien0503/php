	<?php 
	session_start();
	

	if(isset($_POST['sub'])){
		$if1=ctype_alnum($_POST['pass']);
		$if2=(strlen($_POST['name'])>3||strlen($_POST['name'])<15);
		if(!empty($_POST['name'])&&!empty($_POST['pass'])&&!empty($_POST['phone'])&&!empty($_POST['mail'])){
			if(strlen($_POST['name'])<3||strlen($_POST['name'])>15){
				$_SESSION['mass1']="Tài Khoản phải từ 3 ->15 kí tự";
			}
			if(!ctype_alnum( $_POST['pass'])) {
				$_SESSION['mass']='Mật khẩu không được có kí tự đặc biệt';
			}
			if($if1===true&&$if2==true){
				$servername="localhost";
				$username="root";
				$password="";
				$dbname="user";
				$conn=new mysqli($servername,$username,$password,$dbname);
				if ($conn->connect_error) {
					die("connect failed:".$conn->connect_error);
				}
				$sql=("SELECT ID,UserName,Password,Phone,Email from memberkh where UserName='$_POST[name]' or Email='$_POST[mail]' ")or die(mysql_error());
				$result=$conn->query($sql);
				if($result->num_rows>0){
					$_SESSION['mass6']= 'Tài khoản hoặc Email đã tồn tại';

				}
				else{

					$servername="localhost";
					$username="root";
					$password="";
					$dbname="user";
					$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
					$pass=crypt($_POST['pass'], $salt);
					$conn=new mysqli($servername,$username,$password,$dbname);
					if ($conn->connect_error) {
						die("connect failed:".$conn->connect_error);
					}
					$sql=("INSERT into memberkh	(ID,UserName,Password,Phone,Email) Value('','$_POST[name]','$pass','$_POST[phone]','$_POST[mail]')")or die(mysql_error());
					$result=$conn->query($sql);
					if($result===TRUE){
						$_SESSION['mass7']= 'Đăng ký thành công ';


					}
					$conn->close();
				}

			}	
		}
		if(strlen($_POST['name'])<3||strlen($_POST['name'])>15){
			$_SESSION['mass1']="Tài Khoản phải từ 3 ->15 kí tự";
		}
		if(!preg_match('/^[a-zA-Z0-9]+$/', $_POST['pass'])) {
			$_SESSION['mass']='Mật khẩu không được có kí tự đặc biệt';
		}
		if(empty($_POST['name']) ){
			$_SESSION['mass2']='Vui lòng nhập vào';
		}
		if(empty($_POST['pass']) ){
			$_SESSION['mass3']='Vui lòng nhập vào';
		}
		if(empty($_POST['phone']) ){
			$_SESSION['mass4']='Vui lòng nhập vào';
		}
		if(empty($_POST['mail']) ){
			$_SESSION['mass5']='Vui lòng nhập vào';
		}

	}
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Đăng ký</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
		<link rel="stylesheet" href="style.css" >

		<meta charset="UTF-8">
	</head>
	<body>
		<div class="row" ><img src=""></div>
		<div align="center" class="row" >
			<h1><span style="color: red;">Đăng ký tài Khoản</span></h1>
			<form method="POST">
				<table width="50%" cellpadding="3" cellspacing="1">
					<tr>
						<td><input type="text" name="name" size="30px" placeholder="Tên tài khoản">
						</td>
						<td>
							<?php if(isset($_SESSION['mass1'])): ?>
								<p style="color: red;"><?=$_SESSION['mass1'] ?></p>
							<?php endif;unset($_SESSION['mass1']) ?>
							<?php if(isset($_SESSION['mass2'])): ?>
								<p style="color: red;"><?=$_SESSION['mass2'] ?></p>
							<?php endif;unset($_SESSION['mass2']) ?>
							<?php if(isset($_SESSION['mass6'])): ?>
								<p style="color: red;"><?=$_SESSION['mass6'] ?></p>
							<?php endif;unset($_SESSION['mass6']) ?>
						</td>
					</tr>
					<tr>
						<td><input type="password" name="pass" size="30px" placeholder="Mật khẩu">
						</td>
						<td >
							<?php if(isset($_SESSION['mass'])): ?>
								<p style="color: red;"><?=$_SESSION['mass'] ?></p>
							<?php endif;unset($_SESSION['mass']) ?>
							<?php if(isset($_SESSION['mass3'])): ?>
								<p style="color: red;"><?=$_SESSION['mass3'] ?></p>
							<?php endif;unset($_SESSION['mass3']) ?>

						</td>
					</tr>
					<tr>
						<td><input type="text" name="phone" size="30px" placeholder="Số điện thoại">

						</td>
						<td>
							<?php if(isset($_SESSION['mass4'])): ?>
								<p style="color: red;"><?=$_SESSION['mass4'] ?></p>
							<?php endif;unset($_SESSION['mass4']) ?>
						</td>

					</tr>
					<tr>
						<td><input type="text" name="mail" size="30px" placeholder="Email">

						</td>
						<td>
							<?php if(isset($_SESSION['mass5'])): ?>
								<p style="color: red;"><?=$_SESSION['mass5'] ?></p>
							<?php endif;unset($_SESSION['mass5']) ?>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" name="sub" value="Đăng Ký" class="btn-success" size="50px"> <?php if(isset($_SESSION['mass7'])): ?>
		 		<p style="color: red;"><?=$_SESSION['mass7'] ?></p>
		 	<?php endif;unset($_SESSION['mass7']) ?>
						</td>

					</tr>
				</table>	
			</form>
		</div>


		<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
	</html>
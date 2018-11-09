
<?php 
session_start();
if(isset($_POST['sub'])){
	$if1=strlen($_POST['factoryname'])>3||strlen($_POST['factoryname'])<15;
	$if2=ctype_alnum($_POST['pass']);
	if(!empty($_POST['factoryname'])&&!empty($_POST['pass'])&&!empty($_POST['phone'])&&!empty($_POST['email'])){
		if(strlen($_POST['factoryname'])<3||strlen($_POST['factoryname'])>15){
			$_SESSION['mass4']='Tài khoản phải từ 3->15 kí tự';
		}
			if(!ctype_alnum($_POST['pass'])){
				$_SESSION['mass5']='Mật khẩu không được chứa kí tự đặc biệt';
			}
				if($if1===true&&$if2===true){
						$servername="localhost";
				$username="root";
				$password="";
				$dbname="user";
				$conn=new mysqli($servername,$username,$password,$dbname);
				if ($conn->connect_error) {
					die("connect failed:".$conn->connect_error);
				}
				$sql=("SELECT ID,FactoryName,Phone,Email,Level,Password from membercty where FactoryName='$_POST[factoryname]'OR Email='$_POST[email]' ")or die(mysql_error());
				$result=$conn->query($sql);
				if ($result->num_rows>0) {
					$_SESSION['mass6']='Tài khoản hoặc Email đã tồn tại';
					$conn->close();
				}
				else{

					$servername="localhost";
					$username="root";
					$password="";
					$dbname="user";
					$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
					$pass=crypt($_POST['pass'],$salt);
					$conn=new mysqli($servername,$username,$password,$dbname);
					if ($conn->connect_error) {
						die("connect failed:".$conn->connect_error);
					}
					$sql=("INSERT into membercty (ID,FactoryName,Phone,Email,Level,Password) Value('','$_POST[factoryname]','$_POST[phone]','$_POST[email]','','$pass')")or die(mysql_error());
					$result=$conn->query($sql);
					if($result===TRUE){
						$_SESSION['mass7']= 'Đăng ký thành công ';


					}
					$conn->close();


				}
				}
	}
	if(strlen($_POST['factoryname'])<3||strlen($_POST['factoryname'])>15){
			$_SESSION['mass4']='Tài khoản phải từ 3->15 kí tự';
		}
			if(!ctype_alnum($_POST['pass'])){
				$_SESSION['mass5']='Mật khẩu không được chứa kí tự đặc biệt';
			}
	if(empty($_POST['factoryname'])){
		$_SESSION['mass']='Vui lòng nhập tài khoản';
	}
	if(empty($_POST['pass'])){
		$_SESSION['mass1']='Vui lòng nhập mật khẩu';
	}
	if(empty($_POST['phone'])){
		$_SESSION['mass2']='Vui lòng nhập số điện thoại';
	}
	if(empty($_POST['email'])){
		$_SESSION['mass3']='Vui lòng nhập email';
	}
}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Đăng ký công ty</title>
 			<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
 					<link rel="stylesheet" href="style.css" >
 </head>
 <body>
 	<div class="row"></div>
 <div class="row">
 	<form method="POST">
 		<h1 align="center"><span style="color: red">Đăng Ký tài Khoản Cho Công Ty</span></h1>
 		<table align="center">
 			<tr>
 				<td><input type="text" name="factoryname" placeholder="Tên công ty" size="50px"></td>
 				<td><?php if (isset($_SESSION['mass'])): ?>
 					<p style="color: red"><?=$_SESSION['mass']?></p>
 				<?php endif; unset($_SESSION['mass']) ?>
 				<?php if (isset($_SESSION['mass4'])): ?>
 					<p style="color: red"><?=$_SESSION['mass4']?></p>
 				<?php endif; unset($_SESSION['mass4']) ?>
 				<?php if (isset($_SESSION['mass6'])): ?>
 					<p style="color: red"><?=$_SESSION['mass6']?></p>
 				<?php endif; unset($_SESSION['mass6']) ?>
 			</td>
 			</tr>
 			<tr>
 				<td><input type="password" name="pass" placeholder="Mật khẩu"size="50px"></td>
 				<td><?php if (isset($_SESSION['mass1'])): ?>
 					<p style="color: red"><?=$_SESSION['mass1']?></p>
 				<?php endif; unset($_SESSION['mass1']) ?>
 				<?php if (isset($_SESSION['mass5'])): ?>
 					<p style="color: red"><?=$_SESSION['mass5']?></p>
 				<?php endif; unset($_SESSION['mass5']) ?>
 			</td>
 				
 			</tr>
 			<tr>
 				<td><input type="text" name="phone" placeholder="Số điện thoại"size="50px"></td>
 				<?php if (isset($_SESSION['mass2'])): ?>
 					<td><p style="color: red"><?=$_SESSION['mass2']?></p></td>
 				<?php endif; unset($_SESSION['mass2']) ?>
 			</tr>
 			<tr>
 				<td><input type="text" name="email" placeholder="Email"size="50px"></td>
 				<?php if (isset($_SESSION['mass3'])): ?>
 					<td><p style="color: red"><?=$_SESSION['mass3']?></p></td>
 				<?php endif; unset($_SESSION['mass3']) ?>
 			<tr>
 				<td><input type="Submit" name="sub" value="Đăng ký"size="50px" class="btn-warning"><?php if (isset($_SESSION['mass7'])): ?>
 					<p style="color: red"><?=$_SESSION['mass7']?></p>
 				<?php endif; unset($_SESSION['mass7']) ?><a href="signin.php">Đăng nhập</a> </td>
 			</tr>
 			


 		</table>

 	</form>

 </div>
 <script src="bootstrap/js/jquery-3.3.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
 </body>
 </html>
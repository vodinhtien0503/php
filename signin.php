	<?php 
	session_start();
	if(isset($_POST['sub'])){
		if(!empty($_POST['name'])&&!empty($_POST['pass'])){
			$servername="localhost";
			$username="root";
			$password="";
			$dbname="user";
			$conn=new mysqli($servername,$username,$password,$dbname);
			if($conn->connect_error){
				die("Connetion failed ".$conn->connect_error);
			}
			$pass=mysqli_query($conn,"SELECT Password from memberkh where UserName='".$_POST['name']."'");
			$pass=mysqli_fetch_array($pass)['Password'];
			$check=crypt($_POST['pass'],$pass);
			settype($pass, "string");
			settype($check,"string");
			if(hash_equals($check,$pass)){
				if(!empty($_POST['remember'])){
					setcookie("remember_name",$_POST['name'],time()+600);
					setcookie("remember_pass",$_POST['pass'],time()+600);

				}
				else{
					if(isset($_COOKIE['remember_name'])){
						setcookie("remember_name","");
					}
					if(isset($_COOKIE['remember_pass'])){
						setcookie("remember_pass","");
					}
				}
				echo "trang 1";

			}

			else{
				$_SESSION['mass3']='sai mật khẩu hoặc tài khoản';
				$pass=mysqli_query($conn,"SELECT Password from membercty where FactoryName='$_POST[name]' AND Level='0'");
				$pass=mysqli_fetch_array($pass)['Password'];
				$check=crypt($_POST['pass'],$pass);
				settype($pass, "string");
				settype($check,"string");
				if(hash_equals($check,$pass)){
					if(!empty($_POST['remember'])){
						setcookie("remember_name",$_POST['name'],time()+600);
						setcookie("remember_pass",$_POST['pass'],time()+600);

					}
					else{
						if(isset($_COOKIE['remember_name'])){
							setcookie("remember_name","");
						}
						if(isset($_COOKIE['remember_pass'])){
							setcookie("remember_pass","");
						}
					}
					$servername="localhost";
			$username="root";
			$password="";
			$dbname="user";
			$conn=new mysqli($servername,$username,$password,$dbname);
			if($conn->connect_error){
				die("Connetion failed ".$conn->connect_error);
			}
			$sql=(" SELECT ID,FactoryName from membercty where FactoryName='$_POST[name]' ")or die(mysql_error());
			$result=$conn->query($sql);
			while ($data=mysqli_fetch_array($result)) {
			$_SESSION['id']=$data['ID'];
			$_SESSION['name']=$data['FactoryName'];
			}
			header("location:Post.php");

				}
				else{
					$_SESSION['mass3']='sai mật khẩu hoặc tài khoản';
					$pass=mysqli_query($conn,"SELECT Password from membercty where FactoryName='$_POST[name]'AND Level='1'");
					$pass=mysqli_fetch_array($pass)['Password'];
					$check=crypt($_POST['pass'],$pass);
					settype($pass, "string");
					settype($check,"string");
					if(hash_equals($check,$pass)){
						if(!empty($_POST['remember'])){
							setcookie("remember_name",$_POST['name'],time()+600);
							setcookie("remember_pass",$_POST['pass'],time()+600);

						}
						else{
							if(isset($_COOKIE['remember_name'])){
								setcookie("remember_name","");
							}
							if(isset($_COOKIE['remember_pass'])){
								setcookie("remember_pass","");
							}
						}
						echo "trang 3";
					}

				}
			}
		}

		if(empty($_POST['name'])){
			$_SESSION['mass']='Vui lòng nhập tài khoản';
		}
		if(empty($_POST['pass'])){
			$_SESSION['mass1']='Vui kòng nhập mật khẩu';
		}

	}

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Đăng nhập</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
		<link rel="stylesheet" href="style.css" >
	</head>
	<body>
		<div class="container">
			<h1 align="center" style="color: red">Đăng nhập</h1>
			<form method="POST">
				<div class="row">
					<div class="col-lg-4">

					</div>
					<div class="col-lg-5">
						<input type="text" name="name" placeholder="Tên tài khoản" size="40px" value="<?php if(isset($_COOKIE['remember_name'])){echo $_COOKIE['remember_name'];} ?>">
						<?php if(isset($_SESSION['mass'])): ?>
							<p style="color: red"><?= $_SESSION['mass']?></p>
						<?php endif; unset($_SESSION['mass']) ?>
					</div>
					<div class="col-lg-3">

					</div>

				</div>
				<div class="row">
					<div class="col-lg-4">

					</div>
					<div class="col-lg-5">
						<input type="password" name="pass" placeholder="Mật khẩu" size="40px" value="<?php if(isset($_COOKIE['remember_pass'])){echo $_COOKIE['remember_pass'];} ?>">
						<?php if(isset($_SESSION['mass1'])): ?>
							<p style="color: red"><?= $_SESSION['mass1']?></p>
						<?php endif; unset($_SESSION['mass1']) ?>
						<?php if(isset($_SESSION['mass3'])): ?>
							<p style="color: red"><?= $_SESSION['mass3']?></p>
						<?php endif; unset($_SESSION['mass3']) ?>
						
					</div>
					<div class="col-lg-3">

					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">

					</div>
					<div class="col-lg-5">
						<input type="submit"  name="sub" value="Đăng nhập" size="40px" class="btn-warning"><a href="">Quên mật khẩu ?</a><input type="checkbox" name="remember" <?php if(isset($_COOKIE['remember_name'])){?>checked <?php } ?>>Nhớ mật khẩu
					</div>
					<div class="col-lg-3">

					</div>

				</div>
			</form>
		</div>

		<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
	</html>
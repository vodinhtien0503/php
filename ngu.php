<?php
if(isset($_POST['sub'])) {
$servername="localhost";
$username="root";
$password="";
$dbname="user";
$pass=md5($_POST['pass']);
if (strlen($_POST['name'])>25) {
	echo "Tên người dùng không được quá 25 kí tự";
}
else {
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql=("SELECT * from user where Username='$_POST[name]'And Password='$pass'")or die(mysql_error());
$result=$conn->query($sql);
if($result->num_rows>0){
	header("location:ngu2.php");
}
else{
	echo"Đăng nhập thất bại";
}

}
}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <form method="POST">
 	<table>
 		<tr>
 			<td>Username:</td>
 			<td><input type="text" name="name"></td>
 		</tr>
 		<tr>
 			<td>Password:</td>
 			<td><input type="password" name="pass"></td>
 		</tr>
 		<tr>
 			<td></td>
 			<td><input type="submit" name="sub" value="ĐĂNG NHẬP"></td>
 		</tr>
 	</table>
 </form>
 </body>
 </html>
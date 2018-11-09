<?php 
$id=isset($_GET['id'])?(int)$_GET['id']:''	;
if(isset($_POST['sub'])){
$servername="localhost";
$username="root";
$password="";
$dbname="user";
$pass=md5($_POST['pass']);
$conn= new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
	die("connect fail".$conn->connect_error);
}
$sql=("UPDATE user SET Username='$_POST[name]',Password='$pass' where UserID='$_POST[id]' ") or die(mysql_error());
$result=$conn->query($sql);
if($result===TRUE)
	header("location:ngu2.php");
$conn->close();
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <h1>Sửa thành viên</h1>
 <form method="POST">
 	<table>
 	<tr>
 		<td>ID</td>
 		<td><input type="text" name="id" value="<?= $id ?>"></td>

 	</tr>
 	<tr>
 		<td>Username</td>
 		<td><input type="text" name="name"></td>

 	</tr>
 	<tr>
 		<td>Password</td>
 		<td><input type="password" name="pass"></td>

 	</tr>
 	<tr>
 		<td></td>
 		<td><input type="submit" name="sub" value="Sửa"></td>
 	</tr>
 </table>
</form>
 </body>
 </html>
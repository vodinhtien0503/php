<?php 
if(isset($_POST['sub'])){
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="user";
	$pass=md5($_POST['pass']);
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql=("INSERT into user (UserID,Username,Password) value('$_POST[id]','$_POST[name]','$pass')")or die(mysql_error());
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
 <H1>THÊM THÀNH VIÊN</H1>
 <form method="POST">
 	<table>
 		<tr>
 			<td>ID</td>
 			<td><input type="text" name="id"></td>
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
 			<td><input type="submit" name="sub" value="Thêm"></td>
 		</tr>
 	</table>
 </form>
 </body>
 </html>
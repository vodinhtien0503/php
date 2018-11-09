<?php

if(isset($_POST['sub'])){

$servername="localhost";
$username="root";
$password="";
$dbname="test";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection failed".$conn->connect_error);
}
$sql=("INSERT into book (ID,BookName,Authors,CreateDate) value('$_POST[id]','$_POST[name]','$_POST[author]','$_POST[date]')")or die(mysql_error());
$result=$conn->query($sql);
if($result===true)
	header("location:managerbook.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1 >Thêm Book</h1>
<form method="POST">
	<table>
		<tr>
			<td>ID</td>
			<td><input type="text" name="id" ></td>
		</tr>
		<tr>
			<td>BookName</td>
			<td><input type="text" name="name" ></td>
		</tr>
		<tr>
			<td>Authors</td>
			<td><input type="text" name="author" ></td>
		</tr>
		<tr>
			<td>Create</td>
			<td><input type="date" name="date" ></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="sub" value="Thêm"></td>
		</tr>
	</table>
</form>
</body>
</html>
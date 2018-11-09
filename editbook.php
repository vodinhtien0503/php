<?php 
$id=isset($_GET['id'])?(int)$_GET['id']:'';
if(isset($_POST['sub'])){
$servername="localhost";
$username="root";
$password="";
$dbname="test";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection failed".$conn->connect_error);
}
$sql=("UPDATE book Set BookName='$_POST[name]',Authors='$_POST[author]',CreateDate='$_POST[date]' where ID='$_POST[id]'")or die(mysql_error());
$result=$conn->query($sql);
if($result===true){
	header("location:managerbook.php");
}
}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <h1 >Sửa Book</h1>
<form method="POST">
	<table>
		<tr>
			<td>ID</td>
			<td><input type="text" name="id" value="<?=$id?>"></td>
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
			<td><input type="submit" name="sub" value="Sửa"></td>
		</tr>
	</table>
</form>
 </body>
 </html>
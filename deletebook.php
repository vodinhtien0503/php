<?php 
$id=isset($_GET['id'])?(int)$_GET['id']:'';
$servername="localhost";
$username="root";
$password="";
$dbname="test";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection failed".$conn->connect_error);
}
$sql=("DELETE From book where ID=$id")or die(mysql_error());
$result=$conn->query($sql);
if($result===true){
	header("location:managerbook.php");
}

 ?>

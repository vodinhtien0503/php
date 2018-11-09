



 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<h1>Manager</h1>
 	<table>
 		<?php
$servername="localhost";
$username="root";
$password="";
$dbname="user";


 		 $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql=("SELECT * from user")or die(mysql_error());
$result=$conn->query($sql);
while ($data=mysqli_fetch_array($result)) {
	?>
<tr>
	<td>id:<?php echo $data["UserID"]; ?></td>
	<td>username:<?php echo $data["Username"]; ?></td>
	<td>password: <?php echo $data["Password"]; ?></td>
	<td><a href="add.php"><input type="button" value="ADD" name=""></a></td>
	<td><a href="edit.php?id=<?=$data["UserID"]?>"><input type="button" value="Edit" name=""></a></td>
	<td><a href="delete.php?id=<?=$data["UserID"]?>"><input type="button" value="Delete" name=""></a></td>

</tr>




<?php
}
?>
</table> 	
 
 </body>
 </html>
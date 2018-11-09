<?php



  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title></title>
  </head>
  <body>
  <form>
  	<table>
  		<th>ID</th>
  		<th>BookName</th>
  		<th>Authors</th>
  		<th>CreateDate</th>
  		<?php 
  		$servername="localhost";
  		$username="root";
  		$password="";
  		$dbname='test';
  		$conn= new mysqli($servername,$username,$password,$dbname);
  		if($conn->connect_error){
  			die("Connection failed".$conn->connect_error);
  		}
  		$sql=("SELECT * from book ")or die(mysql_error());
  		$result=$conn->query($sql);
  		while($data=mysqli_fetch_array($result)){

  		 ?>
  		 <tr>
  		 	<td><?php echo $data['ID']; ?></td>
  		 	<td><?php echo $data['BookName']; ?></td>
  		 	<td><?php echo $data['Authors']; ?></td>
  		 	<td><?php echo $data['CreateDate']; ?></td>
  		 	<td><a href="addbook.php"><input type="button" name="bt1" value="ADD"></a></td>
  		 	<td><a href="editbook.php?id=<?=$data["ID"]?>"><input type="button" name="bt2" value="EDIT"></a></td>
  		 	<td><a href="deletebook.php?id=<?=$data["ID"]?>"><input type="button" name="bt3" value="DELETE"></a></td>
  		 </tr>
  		 <?php 
  		}

  		  ?>
  	</table>
  </form>
  </body>
  </html>
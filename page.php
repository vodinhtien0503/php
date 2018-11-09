<?php 

$username="root";
$servername="localhost";
$password="";
$dbname="user";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}
$display_number=$_GET['display']? $_GET['display']:2;
$current_page=$_GET['page']? $_GET['page']:1;
$start=($current_page-1)*$display_number;
      $sql="SELECT * from product limit $start,$display_number ";
  $result = $conn->query($sql);

 ?>
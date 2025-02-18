<?php
require("connection.php");
$userId = $_REQUEST["del"];
$status=2;

$res=$con->query("UPDATE `tb_order` 
          SET Status='$status'
          WHERE Productid='$userId'");
		 $count=mysqli_affected_rows($con);
		header("location:userorder.php");
		
   

?>
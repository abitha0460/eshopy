<?php
require("connection.php");
$name=$_REQUEST["productname"];

$price=$_REQUEST["price"];
$quantity=$_REQUEST["quantity"];

$file=$_FILES["image"]["name"];

$res=$con->query("insert into `tb_product`(`ProductName`,`Price`,`Quantity`,`Image`) values('$name','$price','$quantity','$file')");
$count=mysqli_affected_rows($con);

move_uploaded_file($_FILES["image"]["tmp_name"],"productimages/".$file);
header("location:dashboard.php");
?>




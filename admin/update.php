<?php
require("connection.php");
$name=$_REQUEST["productname"];
$price=$_REQUEST["price"];
$quantity=$_REQUEST["quantity"];
$id=$_REQUEST["id"];
$file=$_FILES["image"]["name"];

if(empty($_FILES["image"]["name"]))
{
    $res=$con->query("update tb_product set ProductName='$name',Price='$price',Quantity='$quantity' where Productid='$id'");
    $count=mysqli_affected_rows($con);  
}
else{
    $file=$_FILES["image"]["name"];
    $res=$con->query("update tb_product set ProductName='$name',Price='$price',Image='$file',Quantity='$quantity' where Productid='$id'");
move_uploaded_file($_FILES["image"]["tmp_name"],"productimages/".$file);

}
header("location:table.php");

?>

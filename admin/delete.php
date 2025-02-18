<?php
require("connection.php");
$id = $_REQUEST["del"];
$res = $con -> query("SELECT *FROM tb_product WHERE Productid = $id");
$count = $res->num_rows;
if($count > 0)
    $rows= $res -> fetch_assoc();
    $upload = $rows["Image"];
    unlink("productimages/$upload");
    $res=$con->query("DELETE FROM tb_product where Productid='$id'");
    $count=mysqli_affected_rows($con);
if($count >0)
{
    header("location:table.php");
}
else{ 
        echo 'record not deleted';
    }
?>
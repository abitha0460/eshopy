<?php
require("connection.php");
$id = $_REQUEST["del"];
$res = $con -> query("SELECT *FROM tb_order WHERE Productid = $id");
$count = $res->num_rows;
if($count > 0)
    $rows= $res -> fetch_assoc();
    
    $res=$con->query("DELETE FROM tb_order where Productid='$id'");
    $count=mysqli_affected_rows($con);
if($count >0)
{
    header("location:myorder.php");
}
else{ 
        echo 'order not cancelled';
    }
?>
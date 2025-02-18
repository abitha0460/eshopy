<?php
require("connection.php");
$id = $_REQUEST["del"];
$res = $con -> query("SELECT *FROM tb_register WHERE id = $id");
$count = $res->num_rows;
if($count > 0)
    $rows= $res -> fetch_assoc();
    
    $res=$con->query("DELETE FROM tb_register where id='$id'");
    $count=mysqli_affected_rows($con);
if($count >0)
{
    header("location:index.php");
}
else{ 
        echo 'record not deleted';
    }
?>
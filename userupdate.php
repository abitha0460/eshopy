<?php
require("connection.php");
$id=$_REQUEST["id"];
$name=$_REQUEST["name"];
$email=$_REQUEST["email"];
$password=$_REQUEST["password"];
$phnumber=$_REQUEST["number"];
$country=$_REQUEST["countries"];
$state=$_REQUEST["states"];



    $res=$con->query("update tb_register set Name='$name',Email='$email',Password='$password',Phnumber='$phnumber',Country='$country',State='$state' where id='$id'");
    $count=mysqli_affected_rows($con);  

header("location:myaccount.php");

?>

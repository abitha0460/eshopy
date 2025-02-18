<?php
require("connection.php");
$name=$_REQUEST["Name"];
$email=$_REQUEST["email"];
$password=$_REQUEST["password"];
$phnumber=$_REQUEST["number"];
$country=$_REQUEST["countries"];
$state=$_REQUEST["states"];


$res=$con->query("insert into `tb_register`(`Name`,`Email`,`Password`,`Phnumber`,`Country`,`State`) values('$name','$email','$password','$phnumber','$country','$state')");
$count=mysqli_affected_rows($con);


header("location:index.php");
?>

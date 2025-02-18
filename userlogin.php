<?php
session_start();
require("connection.php");
$email=$_REQUEST["email"];
$password=$_REQUEST["password"];
$res=$con->query("select * from `tb_register` where `Email`='$email' AND `Password`='$password'");
$count=$res->num_rows;
if($count>0)
{
    $_SESSION["ee"]=$email;
    $row=$res->fetch_assoc();
    $id=$row["id"];
    $_SESSION["userid"]=$id;
header("location:myaccount.php");
}

?>
<?php
session_start();
require("connection.php");
$em=$_REQUEST["email"];
$pass=$_REQUEST["password"];
$res=$con->query("select * from `tb-log` where `email`='$em' AND `password`='$pass'");
$count=$res->num_rows;
if($count>0)
{
$_SESSION["eeeeeeee"]=$em;
header("location:dashboard.php");
}
else
{
echo '<script type="text/javascript">';
        echo 'alert("Password Invalid!");';
        echo 'window.location.assign("index.php");</script>';
}
?>
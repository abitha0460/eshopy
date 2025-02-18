
<?php
session_start();
require("connection.php");
$name=$_REQUEST["productname"];

$price=$_REQUEST["price"];
$quantity=$_REQUEST["quantity"];
$totalprice=$_REQUEST["totalprice"];
if (isset($_SESSION["userid"])) {
    $user_id = $_SESSION["userid"];
    $res = $con->query("insert into `tb_order`(`ProductName`,`Price`,`Quantity`,`totalprice`,`user_id`) values('$name','$price','$quantity','$totalprice','$user_id' )"
);
    
$count=mysqli_affected_rows($con);
}
header("location:index.php");
?>






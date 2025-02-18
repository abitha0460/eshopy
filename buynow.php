<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Pricing Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="admin/js/jquery-2.1.1.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="form-container">
<?php
require("connection.php");
$id=$_REQUEST["var"];

$res=$con->query("select * from `tb_product` where `Productid`='$id'");

$count=$res->num_rows;
    if ($count > 0) {
        $rows = $res->fetch_assoc();
	}
?>
    <h2>Order Product</h2>
    <form action="order.php" method="post" enctype="multipart/form-data"id="productForm">
        <div class="form-group">
            <label for="productName">Product Name:</label>
            <input type="text" name="productname" id="productName" value="<?php echo $rows["ProductName"];?>" required readonly>
        </div>
        
        
        
        

        <div class="form-group">
            <label for="price">Price (per unit):</label>
            <input type="text" name="price" value="<?php echo $rows["Price"];?>" id="price">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="text" id="quantity" name="quantity">
        </div>
        
        <p>Total Price: <input type="text" name="totalprice" id="total"></p>
        <button type="submit">Order Now</button>
    </form>
</div>

<script>
$(document).ready(function() {
    $('#quantity').on('keyup',function(){
        
    var price = $('#price').val(); 
    var qu = this.value;
    var tot= price * qu;
    
    
    $('#total').val(tot);
});

});
</script>

</body>
</html>

<?php
session_start(); // Ensure session_start is called at the top
require("connection.php");

if (isset($_SESSION['userid'])) {
    $user_id = $_SESSION['userid'];
    $query = "SELECT * FROM tb_order WHERE user_id = '$user_id'";
    $res = $con->query($query);

    if (!$res) {
        die("Query failed: " . $con->error); // Debugging: Display the SQL error
    }

    $count = $res->num_rows;
} else {
    // Redirect to login if the user is not logged in
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="View and manage your orders">
    <meta name="author" content="Your Name">
    <title>My Orders</title>

    <!-- Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Custom table styling */
        table th, table td {
            text-align: center;
            vertical-align: middle;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        td {
            background-color: #ffffff;
        }

        .cancel-btn {
            color: white;
            background-color: red;
            padding: 5px 15px;
            border-radius: 5px;
            text-decoration: none;
        }

        .cancel-btn:hover {
            background-color: darkred;
        }

        /* Table Styling */
        .table-striped tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        /* Navbar Styling */
        .navbar {
            background-color: #007bff;
        }

        .navbar-nav .nav-link {
            color: white !important;
        }

        .navbar-nav .nav-link:hover {
            color: #f8f9fa !important;
        }

        /* Heading Styling */
        h1 {
            color: #333;
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 30px;
        }

        /* Inner block container styling */
        .inner-block {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Confirm cancel button styling */
        .cancel-btn {
            font-weight: bold;
            color: white;
            background-color: red;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }

        .cancel-btn:hover {
            background-color: darkred;
        }

        /* Optional: Add margin for better layout */
        .container {
            margin-top: 50px;
        }
        .approved {
    color: green;
}
.rejected {
    color: red;
}
.pending {
    color: orange;
}

    </style>
</head>
<body>
    <!-- Navigation Bar (Optional) -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="my_orders.php">My Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content Section -->
    <div class="container mt-5">
    <h1 class="text-center">My Orders</h1>
    
    <!-- Orders Table -->
    <div class="inner-block">
        <?php
            if ($count > 0) {
                echo '<table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Sl.No</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price</th>
                             <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                           
                        </tr>
                    </thead>
                    <tbody>';
                
                $counter = 1;
                while ($rows = $res->fetch_assoc()) {
                    echo '<tr>
                        <th scope="row">' . $counter++ . '</th>
                        <td>' . $rows["ProductName"] . '</td>
                        <td>' . $rows["Price"] . '</td>
                        <td>' . $rows["Quantity"] . '</td>
                        <td>' . $rows["totalprice"] . '</td>
                       
                        <td>';
                        
                        // Handling the status display using PHP
                        if ($rows["Status"] == 1) {
                            echo "<span class='approved'>Approved</span>"; 
                        } elseif ($rows["Status"] == 2) {
                            echo "<span class='rejected'>Rejected</span>";
                        } else {
                            echo "<span class='pending'>Pending</span>";
                        }

                    echo '</td>
                     <td>
                            <a onclick="return confirm(\'Do you want to cancel this order?\')" href="cancelorder.php?del=' . $rows["Productid"] . '" class="cancel-btn">Cancel Order</a>
                        </td>
                    </tr>';
                }

                echo '</tbody></table>';
            } else {
                echo "<p>No orders found!</p>";
            }
        ?>
    </div>
</div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr


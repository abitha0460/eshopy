<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your page description here">
    <meta name="author" content="Your Name">

    <!-- Title of the webpage -->
    <title>My Account</title>

    <!-- External CSS File Links -->
    <link rel="stylesheet" href="styles.css">

    <!-- Favicon (Optional) -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts (Optional) -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS (for table styling) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- External JS Files (Optional) -->
    <script src="script.js" defer></script>
</head>

<body>
    <!-- Main Header Section -->
    <div class="container mt-5">
        <h1 class="text-center">My Account</h1>
        
        <div class="inner-block">
            <!--inner block start here-->
            <?php
            session_start();  // Ensure the session is started
            require("connection.php");
            
            if(isset($_SESSION['userid'])){
                $id = $_SESSION['userid'];  // Get user ID from session
                
                // Use the correct SQL query with the user_id variable
                $res = $con->query("SELECT * FROM tb_register WHERE id='$id'");
                
                // Check if the query was successful
                if(!$res) {
                    die("Query failed: " . $con->error);  // Correct error handling
                }
                
                $count = $res->num_rows;
            ?>

            <!-- Table to display user information -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Sl.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Country</th>
                        <th scope="col">State</th>
                        <th scope="col">Actions</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if user data exists and display it
                    if($count > 0) {
                        $counter = 1;
                        while($rows = $res->fetch_assoc()) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $counter++; ?></th>
                        <td><?php echo htmlspecialchars($rows["Name"]); ?></td>
                        <td><?php echo htmlspecialchars($rows["Email"]); ?></td>
                        <td><?php echo htmlspecialchars($rows["Password"]); ?></td>
                        <td><?php echo htmlspecialchars($rows["Phnumber"]); ?></td>
                        <td><?php echo htmlspecialchars($rows["Country"]); ?></td>
                        <td><?php echo htmlspecialchars($rows["State"]); ?></td>
                        <td><a href="updateprofile.php?var=<?php echo $rows["id"];?>"class="btn btn-warning btn-sm">Update Profile</a></td>
                        
                        <td><a href="userdelete.php?del=<?php echo $rows["id"]; ?>" class="btn btn-warning btn-sm">Delete Profile</a></td>
                        

                    </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>No data found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <?php
            } else {
                echo "<p class='text-center'>Please log in to view your account information.</p>";
            }
            ?>
        </div>
    </div>

    <!-- Optional: Bootstrap JS (for interactions like buttons) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

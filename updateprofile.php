<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <style>
        /* Centering content using CSS */
        body, html {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #d0e7ff; /* Light blue background */
        }
        form {
            width: 280px; /* Reduced width of form */
            background-color: white;
            padding: 15px; /* Reduced padding */
            border-radius: 8px;
            border: 2px solid black; /* Black border for the form */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            font-size: 28px; /* Increased font size for the heading */
            font-weight: bold; /* Making the font bold */
            color: #333;
            margin-bottom: 20px; /* Added margin bottom for spacing */
        }
        .form-group {
            margin-bottom: 8px; /* Reduced margin */
        }
        .form-control {
            width: 100%;
            padding: 8px; /* Reduced padding */
            margin-top: 5px;
            border: 1px solid black; /* Black border for the input fields */
            border-radius: 4px;
            font-size: 14px; /* Reduced font size */
            box-sizing: border-box; /* Ensures padding is included in the element's total width */
        }
        /* Register button in green */
        input[type="submit"] {
            background-color: #4CAF50; /* Green color */
            color: white;
            border: 1px solid black; /* Black border for the button */
            cursor: pointer;
            font-size: 14px; /* Reduced font size */
            padding: 10px;
        }
        input[type="submit"]:hover {
            background-color: #45a049; /* Darker green on hover */
        }
        /* Styling the terms & conditions checkbox */
        input[type="checkbox"] {
            margin-right: 5px;
        }
    </style>
</head>
<body>

    
    <div class="inner-block">
<?php
require("connection.php");
$id=$_REQUEST["var"];

$res=$con->query("select * from `tb_register` where `id`='$id'");

$count=$res->num_rows;
    if ($count > 0) {
        $rows = $res->fetch_assoc();
	}
?>
<form action="userupdate.php" method="post" enctype="multipart/form-data">
<input type="hidden" value="<?php echo $rows["id"];?>" name="id">
        <h1>Update Profile</h1>

        <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" id="name" value="<?php echo $rows["Name"];?>" class="form-control" placeholder="Enter your name" name="name" required>
        </div><br>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" value="<?php echo $rows["Email"];?>"class="form-control" placeholder="Enter your email" name="email" required>
        </div><br>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="number" id="password" value="<?php echo $rows["Password"];?>" class="form-control" placeholder="Enter your password" name="password" required>
        </div><br>

        <div class="form-group">
            <label for="phnumber">Phone Number</label>
            <input type="tel" id="phnumber" value="<?php echo $rows["Phnumber"];?>" class="form-control" placeholder="Enter your phone number" name="number" required>
        </div><br>

        <div class="form-group">
        <label for="country">Country:</label>
                     <select id="country" name="country" class="rb" required>
                     <?php
                     require("connection.php");
                     $selectedCountry = isset($row["Country"]) ? $row["Country"] : ''; 
                      $res = $con->query("SELECT * FROM countries");
                      if ($res->num_rows > 0) {
                      while ($country = $res->fetch_assoc()) {
                      $selected = ($country["cont_id"] == $selectedCountry) ? 'selected' : '';
                      echo '<option value="' . htmlspecialchars($country["cont_id"]) . '" ' . $selected . '>';
                      echo htmlspecialchars($country["name"]);
                      echo '</option>';
                      }
                      } else {
                       echo '<option>No countries available</option>';
                          }
                        ?>
                     </select>
        </div><br>

        <div class="form-group">
        <label for="state">State:</label>
        <br>
					<select id="state" name="state" class="rb" required>
                     <?php
                     require("connection.php");
                     $selectedState = isset($row["State"]) ? $row["State"] : ''; 
                      $res = $con->query("SELECT * FROM states");
                      if ($res->num_rows > 0) {
                      while ($state = $res->fetch_assoc()) {
                      $selected = ($state["stat_id"] == $selectedState) ? 'selected' : '';
                      echo '<option value="' . htmlspecialchars($state["stat_id"]) . '" ' . $selected . '>';
                      echo htmlspecialchars($state["sname"]);
                      echo '</option>';
                      }
                      } else {
                       echo '<option>No states available</option>';
                          }
                        ?>
                     </select>
            
        </div><br>

        <div class="form-group">
            <input type="submit" class="form-control" value="Update">
        </div><br>

        <div class="form-group">
            <input type="checkbox" id="terms" required>
            <label for="terms">I accept the Terms & Conditions</label>
        </div><br>
    </form>

</body>
</html>

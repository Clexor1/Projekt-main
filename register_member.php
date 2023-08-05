
<?php
require_once 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register member</title>
    <link rel="stylesheet" href="index.css">
</head>
<body id="body_forma">
    <nav>
        <ul>
            <li><a href="admin_dashboard.php">Home</a></li>
            <li><a href="#news">About us</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#contact">Registration</a></li>
            <li style="float:right"><a class="active" href="#about">FitGym</a></li>
        </ul>
    </nav>

   <?php  if (isset($_SESSION['poruka'])) { ?>
    <div class="alert">
        <?php
        echo $_SESSION['poruka'];
       unset($_SESSION['poruka']);
        ?>
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
<?php  }; ?>

<h1>Register member</h1>
    <form id="RegisterForm" action="test.php" method = "POST" enctype="multipart/form-data">
        <label for="firstname">First Name:</label>
        <input type="text" id="First_name" name="First_name" required><br>

        <label for="lastname">Last Name:</label>
        <input type="text" id="Last_name" name="Last_name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="Email" name="Email" required><br>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="Phone" name="Phone" required><br>

        <label for="Training_plan">Training Plan:</label>
        <select id="Training_plan_ID" name="Training_plan_ID" required>
            <option value="" disabled selected>Training plan</option>
            <?php
                
                $sql = "SELECT * FROM training_plans";
                $run = $conn -> query($sql);
                $results= $run -> fetch_all(MYSQLI_ASSOC);
                
                foreach($results as $result){
                    echo "<option value = '". $result['Training_plan_ID']. "'>" . $result['Name']. "</option>";
                }
            
            ?>
        </select><br>
        <input type="hidden" name="Photo_path" id="PhotoPathInput">
        <div id="dropzone-upload" class = "Dropzone"></div>

        <button type="submit">Register Member</button>
    </form>
</body>
</html>
<?php
require_once 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add trainer</title>
    <link rel="stylesheet" href="index.css">

    <style>
        
    </style>
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
<div>

    <?php
        $sql1 = "SELECT * FROM members";
        $sql2 = "SELECT * FROM trainers";
        $run = $conn -> query($sql1);
        $results1=$run->fetch_all(MYSQLI_ASSOC);
        $run2 = $conn -> query($sql2);
        $results2=$run2->fetch_all(MYSQLI_ASSOC);
        $select_members = $results1;
        $select_trainers = $results2
    ?>
        <h1>Assing Trainer to Member</h1>
            <form action="assign_trainer.php" method="POST"id="RegisterForm">
                <label for="">Select Member</label>
                <select name="Member" id="">
        <?php foreach($select_members as $member): ?>
                <option value="<?php echo $member['Members_ID']?>">
        <?php echo $member['First_name']. " ". $member['Last_name'];?>
                </option>
        <?php endforeach;   ?>
                </select>
                <label for="">Select Trainer</label>
                <select name="Trainer" id="">
        <?php
              foreach($select_trainers as $trainer): ?>
                <option value="<?php echo $trainer['Trainer_ID']?>">
        <?php echo $trainer['First_name']. " ". $trainer['Last_name'];?>
                </option>
                <?php endforeach;   ?>
                </select>
    <button type="submit" name="submit" value="Assign">Assign trainer</button>
            </form>
    </div>
</body>
</html>
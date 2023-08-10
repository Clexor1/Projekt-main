<?php
require_once 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of trainers</title>
    <link rel="stylesheet" href="index.css">
    <style>

        table{
            color: white;
            text-align: left;
            border-collapse: collapse;
            width: 70%;
            margin-left: auto; 
            margin-right: auto;

             }
        body{
            background-color: #2b2f36;
            }
        thead{
            background-color: #04AA6D;
            }
        tr:hover {background-color: coral;}

        #table td, #table th{
            padding: 10px;
            border: 1px solid white;
        }


    </style>
</head>
<body>
    

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
    <h1>List of trainers</h1>

        <table id="table">
            <thead>
                <th>First Name</th>
                <th>Last name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                
                $sql = "SELECT * FROM trainers";
                $run = $conn -> query($sql);
                $results=$run->fetch_all(MYSQLI_ASSOC);
                

            foreach($results as $result): ?>

            <tr>
                <td><?php echo $result ['First_name'];?></td>
                <td><?php echo $result ['Last_name'];?></td>
                <td><?php echo $result ['Phone'];?></td>
                <td><?php echo $result ['Email'];?></td>
                <td><?php 
                $create_at =  strtotime($result ['Created_date']);
                $new_date = date("F, jS Y",$create_at);
                echo $new_date;
                ?></td> 
                <td>
                    <form action="delete_trainers.php" method="POST">
                    <input type="hidden" name = "Trainer_ID" value="<?php echo $result ['Trainer_ID'];?>">
                    <button>DELETE</button>
                    </form>

                </td>
            </tr>

            <?php endforeach;?>
            </tbody>
        </table>
</body>
</html>
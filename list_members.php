<?php
require_once 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of members</title>
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
    <h1>List of members</h1>

        <table id="table">
            <thead>
                <th>First Name</th>
                <th>Last name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Trainer</th>
                <th>Member id</th>
                <th>Photo</th>
                <th>Training plan</th>
                <th>Access card</th>
                <th>Created At</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                
                $sql = "SELECT members.*,
                training_plans.Name AS training_plan_Name,
                trainers.First_name AS Trainer_First_Name,
                trainers.Last_name AS Trainer_Last_Name
                FROM `members`
                LEFT JOIN `training_plans` ON members.Training_plan_ID = training_plans.Training_plan_ID
                LEFT JOIN `trainers` ON members.Trainer_ID = trainers.Trainer_ID;";
                $run = $conn -> query($sql);
                $results=$run->fetch_all(MYSQLI_ASSOC);
                

            foreach($results as $result): ?>

            <tr>
                <td><?php echo $result ['First_name'];?></td>
                <td><?php echo $result ['Last_name'];?></td>
                <td><?php echo $result ['Phone'];?></td>
                <td><?php echo $result ['Email'];?></td>
                <td><?php 
                    if($result['Trainer_First_Name']){
                        echo $result['Trainer_First_Name'] . " " . $result['Trainer_Last_Name'];
                    }
                    else{
                        echo "Nema trenera";
                    }
                
                ?></td>
                <td><?php echo $result ['Members_ID'];?></td>
                <td><?php echo $result ['Photo_path'];?></td>
                <td><?php 

                if($result['training_plan_Name']){
                    echo $result['training_plan_Name'];
                }
                else{
                    echo "Nema plana";
                }
                
                ?></td>


                <td><a target="blank" href="<?php echo $result ['Access_card'];?>">Access Card</a></td>
                <td><?php 
                $create_at =  strtotime($result ['Created_date']);
                $new_date = date("F, jS Y",$create_at);
                echo $new_date;
                ?></td> 
                <td>
                    <form action="delete_member.php" method="POST">
                    <input type="hidden" name = "Members_ID" value="<?php echo $result ['Members_ID'];?>">
                    <button>DELETE</button>
                    </form>

                </td>
            </tr>

            <?php endforeach;?>
            </tbody>
        </table>
</body>
</html>
<?php
        
        require_once 'config.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){  //dali je poslan zahtjev
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];

        $sql = "SELECT Admin_ID, Password FROM admins WHERE Username= ?"; // dohvacanje podataka
        
        $run = $conn -> prepare($sql); //pripremi se izvrsenje
        $run -> bind_param("s",$Username);
        $run ->execute();  //izvrsi

        $results = $run -> get_result(); //uzmi sto si dobio
        
        
        if($results -> num_rows == 1){
            $admin = $results -> fetch_assoc();

            if(password_verify($Password, $admin['Password'])){
                $_SESSION['Admin_ID'] = $admin['Admin_ID'];
                $conn ->close();
                header('location: admin_dashboard.php');
            }

            
            else{
                $_SESSION['error'] = "Netočan password";
                $conn ->close();
                header('location: index.php');
                exit;
            }
        }
        else{
            $_SESSION['error'] = "Netočan username";
            $conn ->close();
            header('location: index.php');
            exit;
        }
        //var_dump($_POST); //ispis poslanih podataka
    }
  
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <style>
#body1 {
    background-image: url("image/background.jpg");
    color:aliceblue;
    font-size: 30px;
}

#button {
    border-radius: 20px;
    background-color: #ffffff;
    border: none;
    padding: 15px 32px;
    font-size: 20px;
    margin-top: 30px;
    position: relative;
    transition-duration: 0.4s;
    cursor: pointer;
    
  }
  #button:hover{
    background-color: #4CAF50;
    color: white;
  }
  #fieldset{
    width: 370px;
    margin-top: 150px;
    margin-left: 100px;
  }
form{
    text-align: center;
}
.Username {
   margin-bottom: 10px;
}

    </style>
</head>
<body id="body1">

    <?php
    
    if(isset($_SESSION['error'])){
        echo $_SESSION['error']. "<br>";
        unset($_SESSION['error']);
    }
    
    ?>
    <fieldset id="fieldset">
    <legend>Unesi podatke:</legend>
        <form action="index.php" method = "POST">
        <label for="Username">Username:</label>  
        <input type="text" name="Username" class="Username"> <br>
        <label for="" >Password:</label> 
        <input type="Password" name="Password" class="password"> <br>
        <input type="submit" value="Login" id="button">
        </form>
    </fieldset>


</body>
</html>
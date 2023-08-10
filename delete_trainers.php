<?php
        
        require_once 'config.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){  //dali je poslan zahtjev
       $Trainer_ID = $_POST['Trainer_ID'];

       $sql = "DELETE FROM trainers WHERE Trainer_ID = ?";
       $run = $conn -> prepare($sql);
       $run -> bind_param("i", $Trainer_ID);
       $poruka = "";

       if($run -> execute()){
        $poruka ="Trener obrisan";
       }
       else{
        $poruka ="Trener nije obrisan";
       }
       $_SESSION['poruka'] = $poruka;
       header('location: list_trainers.php');
       exit();

    }
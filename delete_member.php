<?php
        
        require_once 'config.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){  //dali je poslan zahtjev
       $Member_ID = $_POST['Members_ID'];

       $sql = "DELETE FROM members WHERE Members_ID = ?";
       $run = $conn -> prepare($sql);
       $run -> bind_param("i", $Member_ID);
       $poruka = "";

       if($run -> execute()){
        $poruka ="Clan obrisan";
       }
       else{
        $poruka ="Clan nije obrisan";
       }
       $_SESSION['poruka'] = $poruka;
       header('location: list_members.php');
       exit();

    }
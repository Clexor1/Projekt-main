<?php
require_once('config.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
$Members_ID = $_POST['Member'];
$Trainer_ID = $_POST['Trainer'];

$sql =" UPDATE members SET Trainer_ID = ? WHERE Members_ID = ? "; 
$run = $conn -> prepare($sql);
$run -> bind_param("ii", $Trainer_ID, $Members_ID);
$run ->execute();
}
$_SESSION['poruka'] = 'Trener dodijeljen clanu';
header("Location: Add_trainer.php")


?>
<?php
require_once('config.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $First_name = $_POST['First_name'];
    $Last_name = $_POST['Last_name'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
}
$sql= "INSERT INTO trainers (First_name, Last_name, Phone, Email) VALUES (?, ?, ?, ?)";

$run = $conn -> prepare($sql);
$run -> bind_param("ssss", $First_name, $Last_name, $Phone, $Email);
$run ->execute();  

    $_SESSION['poruka'] = 'You have successfully registered a trainer.';
    header('location: register_member.php');
    exit();

?>
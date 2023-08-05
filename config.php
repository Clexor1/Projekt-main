<?php
      session_start();
    // povezivanje na bazu
    $_servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $database_name = "baza_projekt";

    $conn = mysqli_connect(($_servername),$db_username,$db_password,$database_name);

    if(!$conn){
        die("Neuspjesna konekcija baze");
    }
    
<?php
require_once('config.php');

if(!isset($_SESSION['Admin_ID'])){
  header('location:index.php');
  exit(); 
  }


  
?>










<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dobrodošli u Teretanu</title>
  <!-- Link to Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="index.css">
  <style>
    body {
      background-color: #f0f0f0;
      
    }
    .container {
      padding: 30px;
    }

    .jumbotron {
      background-color: #3599c4;
    }

    .card {
      margin-bottom: 20px;
    }
  </style>
</head>
      <nav>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#news">About us</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="register_member.php">Registration</a></li>
            <li style="float:right"><a class="active" href="#about">FitGym</a></li>
        </ul>
      </nav>


  <div class="jumbotron text-center">
    <h1>Dobrodošli u Teretanu FitGym</h1>
    <p id="tekst2">Iskoristite svoje vrijeme u teretani i postanite fit!</p>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
        <a href="list_members.php">
          <img src="image/kardio.jpg" alt="Slika teretane" class="card-img-top"  width="300" height="200">
        </a>
          <div class="card-body">
            <h5 class="card-title">Popis membera</h5>
            <p class="card-text">Pregledaj popis membera koji su učlanjeni u FitGym!</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <a href="register_trainers.php">
          <img src="image/vjezbe_snage.jpg" alt="Slika teretane" class="card-img-top" width="300" height="200">
          </a>
          <div class="card-body">
            <h5 class="card-title">Registracija trenera</h5>
            <p class="card-text">Isprobajte različite vježbe snage kako biste izgradili mišićnu masu i snagu.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
        <a href="register_member.php">
          <img src = "image/grupni.jpg" alt="Slika teretane" class="card-img-top"  width="300" height="200">
        </a>
          <div class="card-body">
            <h5 class="card-title">Registracija membera</h5>
            <p class="card-text">Pridružite se našim grupnim treninzima za zabavu i motivaciju uz stručne trenere.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
        <a href="list_trainers.php">
          <img src = "image/grupni.jpg" alt="Slika teretane" class="card-img-top"  width="300" height="200">
        </a>
          <div class="card-body">
            <h5 class="card-title">Popis trenera</h5>
            <p class="card-text">Pridružite se našim grupnim treninzima za zabavu i motivaciju uz stručne trenere.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
        <a href="Add_trainer.php">
          <img src = "image/grupni.jpg" alt="Slika teretane" class="card-img-top"  width="300" height="200">
        </a>
          <div class="card-body">
            <h5 class="card-title">Dodijeli trenera clanu</h5>
            <p class="card-text">Pridružite se našim grupnim treninzima za zabavu i motivaciju uz stručne trenere.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

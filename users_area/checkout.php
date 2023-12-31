<?php 

include('../includes/db.php');
session_start();

?>




<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="contanier-fluid">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../public/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products.php">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Registar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../public/contact.php">Contactos</a>
        </li>
    </div>
  </div>
</nav>
    </div>


    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
            </li>
            <?php 
            if(!isset($_SESSION['username'])){
              echo "<li class='nav-item'>
              <a class='nav-link' href='#'>Bem Vindo Convidado</a>
              ";
            }else{
            echo "<li class='nav-item'>
              <a class='nav-link' href=''>Bem Vindo ".$_SESSION['username']." </a>
              </li>
              ";
            }
            
              if(!isset($_SESSION['username'])){
                  echo "<li class='nav-item'>
                  <a class='nav-link' href='user_login.php'>Login</a>
                  </li>
                  ";
              }else{
                echo "<li class='nav-item'>
                  <a class='nav-link' href='logout.php'>Logout</a>
                  </li>
                  ";
              }

            ?>
            
        </ul>
    </nav>

    <div class="bg-light">
        <h3 class="text-center">Checkout</h3>
    </div>


    <div class="row">
      <div class="col-md-10">
        <div class="row">
            <?php 
                if(!isset($_SESSION['username'])){
                  include('user_login.php'); 
                }else{
                    include('payment.php'); 
                }
            ?>


          

        </div>
      </div>

      <div class="col-md-2  p-0">

      </div>
    </div>

    


    <div class="bg-info  p-3  text-center">
        <p>2023</p>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


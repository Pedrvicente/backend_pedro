<?php 

include('../includes/db.php');
include('../functions/common_function.php');
session_start();

?>




<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lena Earings</title>
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
          <a class="nav-link" href="products.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg><sup><?php cart_number(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Preço Total: <?php total_price()?></a>
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
              <a class='nav-link' href='../users_area/profile.php'>Bem Vindo ".$_SESSION['username']." </a>
              </li>
              ";
            }
            
              if(!isset($_SESSION['username'])){
                  echo "<li class='nav-item'>
                  <a class='nav-link' href='../users_area/user_login.php'>Login</a>
                  </li>
                  ";
              }else{
                echo "<li class='nav-item'>
                  <a class='nav-link' href='../users_area/logout.php'>Logout</a>
                  </li>
                  ";
              }

            ?>
        </ul>
    </nav>

    <div class="bg-light">
        <h3 class="text-center">Lena Earings</h3>
        <p class="text-center">Bem vindos à minha loja</p>
    </div>


    <div class="row">
      <div class="col-md-10">
        <div class="row">

        <?php

          fetch_products();
          categories();

        
        ?>

          

        </div>
      </div>

      <div class="col-md-2  p-0">
        <!-- categorias -->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-secondary text-light ">
            <a href="" class="nav-link"><h3>Categorias</h3></a>
          </li>

          <?php 
          

          $select_categories =  "SELECT * FROM `categories`";
          $fetch_categories =  mysqli_query($connect, $select_categories);

          while($data = mysqli_fetch_assoc($fetch_categories)){
            $category_title = $data['category_title'];
            $category_id = $data['category_id'];

            echo "<li class='nav-item'>
            <a href='index.php?category=$category_id' class='nav-link'>$category_title</a>
          </li>";
          }
          
          
          ?>
        </ul>
      </div>
    </div>

    


    <div class="bg-info  p-3  text-center">
        <p>All Rights Reserved</p>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


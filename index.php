<?php 

include('includes/connect.php');

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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg><sup>1</sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:</a>
        </li>
    </div>
  </div>
</nav>
    </div>


    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
            <a class="nav-link" href="#">Welcome Guest</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
            </li>
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

          $select_query = "SELECT * FROM `products`";
          $fetch_products = mysqli_query($connect, $select_query);

          while( $row = mysqli_fetch_assoc($fetch_products)){
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $description = $row['product_description'];
            $product_id = $row['product_id'];
            $category_id = $row['category_id'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];
            echo "
            <div class='col-md-4 mb-2'>
            <div class='card' style='width: 18rem;'>
              <img src='./images/rouxos.jpg' class='card-img-top' alt='...'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$description</p>
                <a href='#' class='btn btn-primary'>Add to Cart</a>
                <a href='#' class='btn btn-secondary' >View More</a>
              </div>
            </div>
          </div>
            ";
          }

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


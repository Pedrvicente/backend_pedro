<?php 

include('../includes/db.php');
include('../functions/common_function.php');

?>




<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
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


   <div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table">
            
            <?php 

                global $connect;
                $fetch_ip = getIPAddress(); 
                $total_price = 0;
                $cart_query = "SELECT * FROM `cart_details` WHERE ip_adress='$fetch_ip'";
                $result_query = mysqli_query($connect, $cart_query);
                $result_count = mysqli_num_rows($result_query);
                if($result_count > 0){
                  echo "<thead>
                  <tr>
                      <th>Titulo do Produto</th>
                      <th>Imagem</th>
                      <th>Quantidade</th>
                      <th>Preço</th>
                      <th>Remover</th>
                      <th>Operações</th>
                  </tr>
              </thead>
                  ";

                while($row= mysqli_fetch_array($result_query)){
                  $product_id = $row['product_id'];
                  $fetch_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
                  $result_products = mysqli_query($connect, $fetch_products);
                  while($row_price= mysqli_fetch_array($result_products)){
                    $product_price = array($row_price['product_price']);
                    $price_table = $row_price['product_price'];
                    $product_title = $row_price['product_title'];
                    $product_image = $row_price['product_image'];
                    $product_values = array_sum($product_price);
                    $total_price+=$product_values;
                 
            ?>
            <tbody>
                <tr>
                    <td><?php echo $product_title?></td>
                    <td><img src="../images/<?php $product_image ?>"></td>
                    <td><input type="text" name="quantity"></td>
                    <?php 
                      $fetch_ip = getIPAddress(); 
                      if(isset($_POST['update'])){
                        $quantity = $_POST['quantity'];
                        $update_cart = "UPDATE `cart_details` SET quantity=$quantity WHERE ip_adress='$fetch_ip'";
                        $result_cart = mysqli_query($connect, $update_cart);
                        $total_price = $total_price*$quantity;
                      }
                    ?>
                    <td><?php echo $price_table?></td>
                    <td><input type="checkbox" name="remove_item[]" value="<?php  echo $product_id ?>"></td>
                    <td>
                        <input type="submit" value="Atualizar Carrinho" name="update">
                        <input type="submit" value="Remover" name="remove">
                    </td>

                </tr>
                <?php 
                     }
                  
                    }
                  }else{
                    echo "<h2>Carrinho vazio</h2>";
                  }
                ?>
            </tbody>
        </table>
        <div class="d-flex">
          <?php 
          global $connect;
          $fetch_ip = getIPAddress(); 
          $cart_query = "SELECT * FROM `cart_details` WHERE ip_adress='$fetch_ip'";
          $result_query = mysqli_query($connect, $cart_query);
          $result_count = mysqli_num_rows($result_query);
          if($result_count > 0){
            echo "<h4 class='px-3'>Preço Total: $total_price</h4>
            <input type='submit' value='Continuar a Comprar' name='continue_shopping'>
            <a href=''><button>Checkout</button></a>
            ";
          }else{
            echo "<input type='submit' value='Continuar a Comprar' name='continue_shopping'>";
          }
          if(isset($_POST['continue_shopping'])){
            echo "<script>window.open('index.php','_self')</script>";
          }
          ?>
            
        </div>
    </div>
   </div>
   </form>

   <?php

    function remove_cart(){

      global $connect;
      if(isset($_POST['remove'])){
        foreach($_POST['remove_item'] as $remove_id) {
          echo $remove_id;
          $delete_item = "DELETE FROM `cart_details` WHERE product_id=$remove_id";
          $delete = mysqli_query($connect, $delete_item);
          if($delete){
            echo "<script>window.open(cart.php)</script>";
          }
        }
      }
    }
    
    echo $remove_item = remove_cart();
  
  
  ?>
    


    <div class="bg-info  p-3  text-center">
        <p>All Rights Reserved</p>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


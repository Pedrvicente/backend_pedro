<?php

include('../includes/db.php');
include('../functions/common_function.php');

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <div class="container-fluid">

         <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
         </nav>

         <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
         </div>


         <div class="row">
            <div class="col-md-12 bg-secondary p-1">
                <div>
                    <a href="#"><img src=" " alt=""></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button><a href="insert_product.php " class="nav-link text-light bg-secondary my-1">Inserir Produtos</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-secondary my-1">Ver Produtos</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-secondary my-1">Inserir Categorias</a></button>
                    <button><a href="" class="nav-link text-light bg-secondary my-1">Ver Categoria</a>s</button>
                    <button><a href="" class="nav-link text-light bg-secondary my-1">Encomendas</a></button>
                    <button><a href="" class="nav-link text-light bg-secondary my-1">Pagamentos</a></button>
                    <button><a href="" class="nav-link text-light bg-secondary my-1">Users</a></button>
                    <button><a href="" class="nav-link text-light bg-secondary my-1">Logout</a></button>
                </div>

                <div class="container my-5">
                    <?php 
                    
                        if(isset($_GET['insert_category'])){
                            include('insert_categories.php');
                        };
                        if(isset($_GET['view_products'])){
                            include('view_products.php');
                        };
                    ?>
                </div>
            </div>
         </div>
    </div>


    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<?php

include('../includes/db.php');
include('../functions/common_function.php');
session_start();
if(empty($_SESSION['admin_name'])){
    echo "<script>window.open('admin_login.php','_self')</script>";
}
?>




<!DOCTYPE html>
<html lang="pt">
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
                            <a href="" class="nav-link">

                            <?php 

                            if(!isset($_SESSION['admin_name'])){
                                echo "<li class='nav-item'>
                                <a class='nav-link' href='#'>Bem Vindo Convidado</a>
                                ";
                            }else{
                            echo "<li class='nav-item'>
                                <a class='nav-link' href='admin_profile.php'>Bem Vindo ".$_SESSION['admin_name']." </a>
                                </li>
                                ";
                            }


                            
                            if(!isset($_SESSION['admin_name'])){
                                echo "<li class='nav-item'>
                                <a class='nav-link' href='admin_login.php'>Login</a>
                                </li>
                                ";
                            }else{
                                echo "<li class='nav-item'>
                                <a class='nav-link' href='../users_area/logout.php'>Logout</a>
                                </li>
                                ";
                            }

                            ?>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
         </nav>

         <div class="bg-light">
            <h3 class="text-center p-2">Painel Administrador</h3>
         </div>


         <div class="row">
            <div class="col-md-12 bg-secondary p-1">
                <div class="button text-center">
                    <button><a href="insert_product.php " class="nav-link text-light bg-secondary my-1">Inserir Produtos</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-secondary my-1">Ver Produtos</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-secondary my-1">Inserir Categorias</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-secondary my-1">Ver Categorias</a>s</button>
                    <button><a href="index.php?view_orders" class="nav-link text-light bg-secondary my-1">Encomendas</a></button>
                    <button><a href="" class="nav-link text-light bg-secondary my-1">Pagamentos</a></button>
                    <button><a href="index.php?view_users" class="nav-link text-light bg-secondary my-1">Users</a></button>
                    <button><a href="index.php?admin_profile" class="nav-link text-light bg-secondary my-1">Meu perfil</a></button>
                    <button><a href="index.php?admin_registration" class="nav-link text-light bg-secondary my-1">Registar</a></button>
                    <button><a href="../users_area/logout.php" class="nav-link text-light bg-secondary my-1">Logout</a></button>
                </div>

                <div class="container my-5">
                    <?php 
                    
                        if(isset($_GET['insert_category'])){
                            include('insert_categories.php');
                        };
                        if(isset($_GET['view_products'])){
                            include('view_products.php');
                        };
                        if(isset($_GET['edit_products'])){
                            include('edit_products.php');
                        };
                        if(isset($_GET['delete_product'])){
                            include('delete_product.php');
                        };
                        if(isset($_GET['view_categories'])){
                            include('view_categories.php');
                        };
                        if(isset($_GET['edit_category'])){
                            include('edit_category.php');
                        };
                        if(isset($_GET['remove_category'])){
                            include('remove_category.php');
                        };
                        if(isset($_GET['view_orders'])){
                            include('view_orders.php');
                        };
                        if(isset($_GET['delete_order'])){
                            include('delete_order.php');
                        };
                        if(isset($_GET['view_users'])){
                            include('view_users.php');
                        };
                        if(isset($_GET['admin_registration'])){
                            include('admin_registration.php');
                        };
                        if(isset($_GET['delete_user'])){
                            include('delete_user.php');
                        };
                        if(isset($_GET['admin_profile'])){
                            include('admin_profile.php');
                        };
                    ?>
                </div>
            </div>
         </div>
    </div>


    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
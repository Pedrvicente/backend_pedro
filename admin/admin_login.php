<?php

    include('../includes/db.php');
    include('../functions/common_function.php');
    @session_start();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <div class="container-fluid">
        <h2 class="text-center">Login</h2>
        <div class="row">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="mb-4">
                        <label for="admin_name" class="form-label">Nome de Administrador</label>
                        <input type="text" id="admin_name" class="form-control" placeholder="Nome de Administrador" required name="admin_name">
                    </div>
                    <div class="mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Password" required name="admin_password">
                    </div>
                    <div>
                        <input type="submit" value="Login" name="admin_login">
                        <p>Ainda não tem conta? <a href="admin_registration.php">Criar Conta</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>

    <?php
    if(isset($_POST['admin_login'])){
        $admin_name = $_POST['admin_name']; 
        $admin_password = $_POST['admin_password']; 

        $select_query = "SELECT * FROM `admin_table` WHERE admin_name = '$admin_name'";
        $result = mysqli_query($connect, $select_query);
        $row_count = mysqli_num_rows($result);
        $row_data = mysqli_fetch_assoc($result);



        if($row_count > 0){
            $_SESSION['admin_name'] = $admin_name;
            if(password_verify($admin_password,$row_data['admin_password'])){
                
                if($row_count == 1 and $row_count_cart == 0){
                    $_SESSION['admin_name'] = $admin_name;
                    echo "<script>alert('Bem vindo')</script>";
                    echo "<script>window.open('index.php', '_self')</script>";
                }else{
                echo "<script>alert('Credênciais Erradas')</script>";
            }

        }else{
            echo "<script>alert('Credênciais Erradas')</script>";
        }
    }
}
    ?>
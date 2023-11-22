<?php

    include('../includes/db.php');
    include('../functions/common_function.php');
    @session_start();

?>




<!DOCTYPE html>
<html lang="pt">
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
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" class="form-control" placeholder="Username" required name="username">
                    </div>
                    <div class="mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Password" required name="user_password">
                    </div>
                    <div>
                        <input type="submit" value="Login" name="user_login">
                        <p>Ainda não tem conta? <a href="user_registration.php">Criar Conta</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


<?php


    if(isset($_POST['user_login'])){
        $username = mysqli_real_escape_string($connect,$_POST['username']); 
        $user_password = mysqli_real_escape_string($connect,$_POST['user_password']); 

        $select_query = "SELECT * FROM `user_table` WHERE username = '$username'";
        $result = mysqli_query($connect, $select_query);
        $row_count = mysqli_num_rows($result);
        $row_data = mysqli_fetch_assoc($result);
        $user_ip = getIPAddress();


        $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_adress = '$user_ip'";
        $select_cart = mysqli_query($connect, $select_query_cart);
        $row_count_cart = mysqli_num_rows($select_cart);


        if($row_count > 0){
            $_SESSION['username'] = $username;
            if(password_verify($user_password,$row_data['user_password'])){
                
                // echo "<script>alert('Bem vindo')</script>";
                if($row_count == 1 and $row_count_cart == 0){
                    $_SESSION['username'] = $username;
                    echo "<script>alert('Bem vindo')</script>";
                    echo "<script>window.open('profile.php', '_self')</script>";
                }else{
                    $_SESSION['username'] = $username;
                    echo "<script>alert('Bem vindo')</script>";
                    echo "<script>window.open('payment.php', '_self')</script>";
                }
            }else{
                echo "<script>alert('Credênciais Erradas')</script>";
            }

        }else{
            echo "<script>alert('Credênciais Erradas')</script>";
        }
    }

?>
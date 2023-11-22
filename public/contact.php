<?php 

include('../includes/db.php');
include('../functions/common_function.php');
session_start();

$message_sent = false;
if(isset($_POST['submit'])){

    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $name = mysqli_real_escape_string($connect,$_POST['name']);
        $email = mysqli_real_escape_string($connect,$_POST['email']);
        $subject = mysqli_real_escape_string($connect,$_POST['subject']);
        $message = mysqli_real_escape_string($connect,$_POST['message']);

        $to = "pedro11gil@outlook.com";
        $body = "";


        $body .="From: ".$name. "\r\n";
        $body .="Email: ".$email. "\r\n";
        $body .="Message: ".$message. "\r\n";


        mail($to,$message,$body);

        $message_sent = true;
    }else{
        echo "<script>alert('Preencha Corretamente')</script>";
    }
}
if($message_sent){
    echo "<script>alert('Obrigado pela mensagem')</script>";
    echo "<script>window.open('index.php','_self')</script>";
}else{
    echo "<script>window.open('contact.php','_self')</script>";
}

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
          <a class="nav-link" href="products.php">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../users_area/user_registration.php">Registar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contactos</a>
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
    <h3 class="text-center mt-4">Entre em Contacto Comigo</h3>
    <form action="" method="post">
        <div class="mb-4">
            <input type="text" name="name" placeholder="Nome" class="form-control w-50 m-auto" required>
        </div>
        <div class="mb-4">
        <input type="text" name="email" placeholder="Email" class="form-control w-50 m-auto" required>
        </div>
        <div class="mb-4">
            <input type="text" name="subject" placeholder="Assunto" class="form-control w-50 m-auto" required>
        </div>
        <div class="mb-4">
             <textarea name="message" id="" cols="30" rows="10" placeholder="Mensagem" class="form-control w-50 m-auto"></textarea required>
        </div>
        <div class="mb-4">
             <button type="submit" name="submit" class="form-control w-50 m-auto">Submeter</button>
        </div>
        
    </form>
    </body>
</html>
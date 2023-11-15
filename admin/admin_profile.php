<?php 

include('../includes/db.php');
// include('../functions/common_function.php');
?>




<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem Vindo <?php echo $_SESSION['admin_name'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="row">
        <div class="col-md-2 p-0">
            <ul class="navbar-nav text-center">
                <li class="nav-item">
                    <a href="admin_profile.php"><h4>Teu Perfil</h4></a>
                </li>
                <li class="nav-item">
                    <a href="admin_profile.php?edit_admin_account">Editar Conta</a>
                </li>
                <li class="nav-item">
                    <a href="admin_profile.php?delete_admin_account">Apagar Conta</a>
                </li>
                <li class="nav-item">
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <?php 
            if(isset($_GET['edit_admin_account'])){
                include('edit_admin_account.php');
            }

            if(isset($_GET['delete_admin_account'])){
                include('delete_admin_account.php');
            }
            ?>
        </div>
    </div>












    <div class="row">
      <div class="col-md-10">
        <div class="row">

        

    


    <div class="bg-info  p-3  text-center">
        <p>All Rights Reserved</p>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


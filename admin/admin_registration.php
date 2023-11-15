<?php

    include('../includes/db.php');
    include('../functions/common_function.php');

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registar Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h3>Registar Administrador</h3>
        <div class="row">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="mb-4">
                        <label for="admin_name" class="form-label">Username</label>
                        <input type="text" id="admin_name" class="form-control" placeholder="Nome de Administrador" required name="admin_name">
                    </div>
                    <div class="mb-4">
                        <label for="admin_email" class="form-label">Email</label>
                        <input type="text" id="admin_email" class="form-control" placeholder="Email" required name="admin_email">
                    </div>
                    <div class="mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Password" required name="admin_password">
                    </div>
                    <div class="mb-4">
                        <label for="confirm_password" class="form-label">Confirmar Password</label>
                        <input type="password" id="confirm_password" class="form-control" placeholder="Confirmar Password" required name="confirm_password">
                    </div>
                    <div>
                        <input type="submit" value="Registar" name="admin_register">
                        <p>Já tem uma conta? <a href="admin_login.php">Fazer Login</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php

if(isset($_POST['admin_register'])){
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $hide_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];


    $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$admin_name' OR admin_email='$admin_email'";

    $result = mysqli_query($connect, $select_query);

    $rows_count = mysqli_num_rows($result);
    if($rows_count > 0){
        echo "<script>alert('Administrador já existe')</script>";
    }else if($admin_password!=$confirm_password){
        echo "<script>alert('Passwords não coicidem')</script>";
    } 
    
    else{
        $insert_query = "INSERT INTO `admin_table` (admin_name, admin_email, admin_password) VALUES ('$admin_name','$admin_email','$hide_password')";

        $result_query = mysqli_query($connect,$insert_query);
    
        if($result_query){
            echo "<script>alert('Dados inseridos com sucesso')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }else{
            die(mysqli_error($connect));
        }
    }
}
    ?>
</body>
</html>
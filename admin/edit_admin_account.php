<?php

    session_start();

    if(isset($_GET['edit_admin_account'])){
        $admin_session = $_SESSION['admin_name'];
        $select_query = "SELECT * FROM `admin_table` WHERE admin_name = '$admin_session'";
        $result_query = mysqli_query($connect, $select_query);
        $row_fetch = mysqli_fetch_assoc($result_query);
        $admin_id = $row_fetch['admin_id'];
        $admin_name = $row_fetch['admin_name'];
        $admin_password = $row_fetch['admin_password'];
        $admin_email = $row_fetch['admin_email'];

    }
        if(isset($_POST['admin_update'])){
            $update_id = $admin_id;
            $admin_name = $_POST['admin_name'];
            $user_password = $_POST['admin_password'];
            $hide_password = password_hash($user_password, PASSWORD_DEFAULT);
            $admin_email = $_POST['admin_email'];


            $update_query = "UPDATE `admin_table` SET admin_name='$admin_name' WHERE admin_id=$update_id";
            $result_update = mysqli_query($connect, $update_query);

            if($result_update){
                echo "<script>alert('Alterações feitas com sucesso')</script>";
                echo "<script>window.open('../users_area/logout.php','_self')</script>";
            }

        }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Conta</title>
</head>
<body>
    <h3 class="text-center">Editar Conta</h3>
    <form action="" method="post" class="text-center">
    <div class="mb-4">
        <input type="text" name="admin_name" id="" value="<?php echo $admin_name ?>" class="form-control w-50 m-auto">
    </div>
    <div class="mb-4">
        <input type="password" name="admin__password" id="" value="<?php echo $hide_password ?>" class="form-control w-50 m-auto">
    </div>
    <div class="mb-4">
        <input type="email" name="admin_email" id="" value="<?php echo $admin_email ?>" class="form-control w-50 m-auto">
    </div>
    <input type="submit" value="Atualizar" name="admin_update" id="" class="m-auto">
    </form>
</body>
</html>
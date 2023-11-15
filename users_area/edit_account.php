<?php



    if(isset($_GET['edit_account'])){
        $user_session = $_SESSION['username'];
        $select_query = "SELECT * FROM `user_table` WHERE username = '$user_session'";
        $result_query = mysqli_query($connect, $select_query);
        $row_fetch = mysqli_fetch_assoc($result_query);
        $user_id = $row_fetch['user_id'];
        $username = $row_fetch['username'];
        $user_password = $row_fetch['user_password'];
        $hide_password = password_hash($user_password, PASSWORD_DEFAULT);
        $user_email = $row_fetch['user_email'];
        $user_adress = $row_fetch['user_adress'];
        $user_mobile = $row_fetch['user_mobile'];

    }
        if(isset($_POST['user_update'])){
            $update_id = $user_id;
            $username = $_POST['username'];
            $user_password = $_POST['user_password'];
            $hide_password = password_hash($user_password, PASSWORD_DEFAULT);
            $user_email = $_POST['user_email'];
            $user_adress = $_POST['user_adress'];
            $user_mobile = $_POST['user_mobile'];


            $update_query = "UPDATE `user_table` SET username='$username', user_password='$hide_password',user_email='$user_email',user_adress='$user_adress',user_mobile='$user_mobile' WHERE user_id=$update_id";
            $result_update = mysqli_query($connect, $update_query);

            if($result_update){
                echo "<script>alert('Alterações feitas com sucesso')</script>";
                echo "<script>window.open('logout.php','_self')</script>";
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
        <input type="text" name="username" id="" value="<?php echo $username ?>" class="form-control w-50 m-auto">
    </div>
    <div class="mb-4">
        <input type="password" name="user_password" id="" value="<?php echo $hide_password ?>" class="form-control w-50 m-auto">
    </div>
    <div class="mb-4">
        <input type="email" name="user_email" id="" value="<?php echo $user_email ?>" class="form-control w-50 m-auto">
    </div>
    <div class="mb-4">
        <input type="text" name="user_adress" id="" value="<?php echo $user_adress ?>" class="form-control w-50 m-auto">
    </div>
    <div class="mb-4">
        <input type="text" name="user_mobile" id="" value="<?php echo $user_mobile ?>" class="form-control w-50 m-auto">
    </div>
    <input type="submit" value="Atualizar" name="user_update" id="" class="m-auto">
    </form>
</body>
</html>
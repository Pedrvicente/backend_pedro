<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar Conta</title>
</head>
<body>
    <h1>Apagar Conta</h1>
    <form action="" method="post">
        <div>
            <input type="submit" value="Apagar Conta" name="delete">
        </div>
        <div>
            <input type="submit" value="Voltar Atrás" name="dont_delete">
        </div>
    </form>


    <?php


        $username_session = $_SESSION['username'];
        if(isset($_POST['delete'])){
            $delete_query = "DELETE FROM `user_table` WHERE username='$username_session'";
            $result = mysqli_query($connect, $delete_query);
            if($result){
                session_destroy();
                echo "<script>alert('Conta Apagada com Sucesso')</script>";
                echo "<script>window.open('../public/index.php','_self')</script>";
            }
        }

        if(isset($_POST['dont_delete'])){
            echo "<script>window.open('profile.php','_self')</script>";
        }

    ?>
</body>
</html>
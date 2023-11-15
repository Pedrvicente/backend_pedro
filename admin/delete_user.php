<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Utilizador</title>
</head>
<body>
    <h3 class="text-center">Apagar Utilizador</h3>
    <?php

        if(isset($_GET['delete_user'])){
            $delete_id = $_GET['delete_user'];
            $delete_user = "DELETE FROM `user_table` WHERE user_id = $delete_id";
            $result_user = mysqli_query($connect, $delete_user);
            if($result_user){
                echo "<script>alert('Utilizador Apagado')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }

    ?>
</body>
</html>
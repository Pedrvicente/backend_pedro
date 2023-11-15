<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Encomenda</title>
</head>
<body>
    <h3 class="text-center">Apagar Encomenda</h3>
    <?php

        if(isset($_GET['delete_order'])){
            $delete_id = $_GET['delete_order'];
            $delete_order = "DELETE FROM `user_orders` WHERE order_id = $delete_id";
            $result_order = mysqli_query($connect, $delete_order);
            if($result_order){
                echo "<script>alert('Encomenda Removida')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }

    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center">Apagar Produto</h3>
    <?php

        if(isset($_GET['delete_product'])){
            $delete_id = $_GET['delete_product'];
            $delete_product = "DELETE FROM `products` WHERE product_id = $delete_id";
            $result_product = mysqli_query($connect, $delete_product);
            if($result_product){
                echo "<script>alert('Produto Removido')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }

    ?>
</body>
</html>
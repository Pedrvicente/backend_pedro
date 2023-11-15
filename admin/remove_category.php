<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Categoria</title>
</head>
<body>
    <h3 class="text-center">Apagar Categoria</h3>
    <?php

        if(isset($_GET['remove_category'])){
            $delete_id = $_GET['remove_category'];
            $delete_category = "DELETE FROM `categories` WHERE category_id = $delete_id";
            $result_category = mysqli_query($connect, $delete_category);
            if($result_category){
                echo "<script>alert('Categoria Removida')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }

    ?>
</body>
</html>
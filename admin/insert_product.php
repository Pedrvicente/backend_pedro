<?php 

include('../includes/db.php'); 
if(isset($_POST['insert_product'])){
    

    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';


    $product_image = $_FILES['product_image']['name'];
    $temp_image = $_FILES['product_image']['tmp_name'];


     if($product_title == '' or $description == '' or $product_category == '' or $product_price == '' or $product_image == ''){
        echo "<script>alert('Preencher todos os campos ')</script>";
        exit();
     }else{
        move_uploaded_file($temp_image,"../images/$product_image");

        $insert_products = "INSERT INTO `products` (product_title, product_description, category_id, product_price, product_image, date, status)  VALUES('$product_title', '$description', '$product_category', '$product_price', '$product_image', NOW(), '$product_status')";

        $result_query = mysqli_query($connect, $insert_products);

        if($result_query){
            echo "<script>alert('Produto Inserido com Sucesso')</script>"; 
        }
     }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-3">Inserir Produtos</h1>

        
        <form action="" method="post" enctype="multipart/form-data">
            <!-- titulo -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Titulo do Produto" autocomplete="off" required>
            </div>

            <!-- descrição -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Descrition</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Descrição" autocomplete="off" required>
            </div>

            <!-- categoria  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select Category</option>
                    <?php

                        $select_query = "Select * from `categories` ";
                        $result_query = mysqli_query($connect, $select_query);

                        while($row = mysqli_fetch_assoc($result_query)){
                            $category_title = $row['category_title'];
                            $category_id = $row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>

                </select>
            </div>

            <!-- imagem  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image" class="form-label">Imagem</label>
                <input type="file" name="product_image" id="product_image" class="form-control" placeholder="Imagem" autocomplete="off" required>
            </div>

            <!-- preço  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Preço</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Preço" autocomplete="off" required>
            </div>

            <!-- submeter  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-light mb-3" value="Inserir Produto">
            </div>
        </form>
    </div>
    








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
</body>
</html>
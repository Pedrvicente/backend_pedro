<?php

if(isset($_GET['edit_products'])){
    $get_id = $_GET['edit_products'];
    $select_data = "SELECT * FROM `products` WHERE product_id = '$get_id'";
    $result = mysqli_query($connect,$select_data);
    $row_data = mysqli_fetch_assoc($result);
    $product_title = $row_data['product_title'];
    $product_description = $row_data['product_description'];
    $category_id = $row_data['category_id'];
    $product_image = $row_data['product_image'];
    $product_price = $row_data['product_price'];

    
    $select_category = "SELECT * FROM `categories` WHERE category_id=$category_id";
    $result_category = mysqli_query($connect, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $category_name = $row_category['category_title'];
    
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
<div class="container">
        <h1 class="text-center mt-3">Editar Produto</h1>

        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Titulo</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Titulo do Produto" autocomplete="off" value="<?php echo $product_title ?>" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Descrição</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Descrição" autocomplete="off" value="<?php echo $product_description ?>" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="<?php echo $category_name ?>"><?php echo $category_name ?></option>
                    <?php


                    $select_categories_all = "SELECT * FROM `categories`";
                    $result_categories_all = mysqli_query($connect, $select_categories_all);
                    while($row_categories_all = mysqli_fetch_assoc($result_categories_all)){
                        $category_name = $row_categories_all['category_title'];
                        $category_id = $row_categories_all['category_id'];
                        echo "<option value='$category_name'>$category_name</option>";
                    }
                    

                    ?>
                </select>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image" class="form-label">Imagem</label>
                <input type="file" name="product_image" id="product_image" class="form-control" placeholder="Imagem" autocomplete="off" required>
                <img src="../images/<?php echo $product_image ?>" width="50" alt="">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Preço</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Preço" autocomplete="off" value="<?php echo $product_price ?>" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="edit_product"  value="Editar Produto">
            </div>
        </form>
    </div>
</body>
</html>
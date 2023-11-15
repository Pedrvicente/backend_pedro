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
                <input type="text" name="product_description" id="description" class="form-control" placeholder="Descrição" autocomplete="off" value="<?php echo $product_description ?>" required>
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
    <?php


        if(isset($_POST['edit_product'])){
            $product_title = $_POST['product_title'];
            $product_description = $_POST['product_description'];
            $product_category = $_POST['product_category'];
            $product_image = $_FILES['product_image']['name'];
            $tmp_image = $_FILES['product_image']['tmp_name'];
            $product_price = $_POST['product_price'];

            if($product_title == '' or $product_description == '' or $product_category == '' or $product_image == '' or $product_price == ''){
                echo "<script>alert('Por favor preencha todos os campos')</script>";
            }else{
                move_uploaded_file($tmp_image,"../images/$product_image");

                $update = " UPDATE `products` SET product_title='$product_title',product_description='$product_description',category_id='$product_category', product_image='$product_image',product_price='$product_price', DATE=NOW() WHERE product_id=$get_id";
                $result_update = mysqli_query($connect, $update);
                if($result_update){
                    echo "<script>alert('Alterações feitas com sucesso')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                }

        }
    }
    
    ?>
</body>
</html>
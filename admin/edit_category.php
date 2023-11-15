<?php

    if(isset($_GET['edit_category'])){
        $get_id = $_GET['edit_category'];
        $select_category = "SELECT * FROM `categories` WHERE category_id='$get_id'";
        $result = mysqli_query($connect,$select_category);
        $row_data = mysqli_fetch_assoc($result);
        $category_title = $row_data['category_title'];
    }


    if(isset($_POST['edit_category'])){
        $category_title = $_POST['category_title'];
        $update = " UPDATE `categories` SET category_title='$category_title' WHERE category_id=$get_id";
        $result_update = mysqli_query($connect, $update);
            if($result_update){
                echo "<script>alert('Alterações feitas com sucesso')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
    }

?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
</head>
<body>
    <div class="container">
        <h3 class="text-center">Editar Categoria</h3>
        <form action="" method="post">
            <div class="form-outline mb-4">
                <label for="category_title" class="form-label">Titulo</label>
                <input type="text" name="category_title" id="category_title" class="form-control w-50" value="<?php echo $category_title ?>" required>
            </div>
            <input type="submit" name="edit_category" value="Atualizar">
        </form>
    </div>
</body>
</html>
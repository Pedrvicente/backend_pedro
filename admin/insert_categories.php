<?php 

include('../includes/db.php');

if(isset($_POST['insert_cat'])){
    $category_title = mysqli_real_escape_string($connect,$_POST['cat_title']);

    /* select data from database */
    $select_query = "Select * from `categories` where category_title='$category_title' ";
    $result_select = mysqli_query($connect, $select_query);
    $number = mysqli_num_rows($result_select);

    if($number > 0){
        echo "<script>alert('Esta Categoria já existe')</script>";
    }else{
        $insert_query = "INSERT INTO `categories` (category_title) VALUES ('$category_title')";
        $result = mysqli_query($connect, $insert_query);

        if($result){
            echo "<script>alert('Categoria Adicionada')</script>";
    }
}};
    
    
?>


<h2 class="text-center">Insert Caregories</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
    <span class="input-group-text bg-secondary " id="basic-addon1"><i class="fa-solid fa-receipt"> </i></span>
    <input type="text" class="form-control" name="cat_title" placeholder="Inserir Categorias" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-10 mb-2">


        <input type="submit" class="bg-light  my-3" name="insert_cat" value="Insert Categories"  aria-label="Username" aria-describedby="basic-addon1" >

        

    </div>

    
</form>
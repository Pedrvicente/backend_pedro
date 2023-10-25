<?php 

include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
    $category_title = $_POST['cat_title'];

    /* select data from database */
    $select_query = "Select * from `categories` where category_title='$category_title' ";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if($number > 0){
        echo "<script>alert('this category as already been created')</script>";
    }else{
        $insert_query = "insert into `categories` (category_title) values ('$category_title')";
        $result = mysqli_query($con, $insert_query);

        if($result){
            echo "<script>alert('category as been inserted ok')</script>";
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
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Categorias</title>
</head>
<body>
    <h3 class="text-center">Ver Categorias</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Categoria</th>
                <th>Editar</th>
                <th>Remover</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $select_category = "SELECT * FROM `categories`";
                $result = mysqli_query($connect, $select_category);
                $number = 0;
                while($row = mysqli_fetch_assoc($result)){
                    $category_id = mysqli_real_escape_string($connect,$row['category_id']);
                    $category_title = mysqli_real_escape_string($connect,$row['category_title']);
                    $number++;

            ?>
            <tr>
                <td><?php  echo $number;  ?></td>
                <td><?php  echo $category_title;  ?></td>
                <td><a href='index.php?edit_category=<?php  echo $category_id?>'>Editar</a></td>
                <td><a href='index.php?remove_category=<?php  echo $category_id?>'>Remover</a></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Produtos</title>
</head>
<body>
    <h1 class="text-center">Ver Produtos</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Product Id</th>
                <th>Titulo Produto</th>
                <th>Imagem</th>
                <th>Preço</th>
                <th>Vendidos</th>
                <th>Status</th>
                <th>Editar</th>
                <th>Remover</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $select_products = "SELECT * FROM `products`";
            $result = mysqli_query($connect, $select_products);
            $number = 0;
            while($row=mysqli_fetch_assoc($result)){
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image = $row['product_image'];
                $product_price = $row['product_price'];
                $product_status = $row['status'];
                $number++;
                ?>
                <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo $product_title;?></td>
                <td><img src='../images/<?php echo $product_image; ?>' width='40'/></td>
                <td><?php echo $product_price; ?></td>
                <td>
                <?php
                    $select_count = "SELECT * FROM `pending_orders` WHERE product_id='$product_id'";
                    $result_count = mysqli_query($connect, $select_count);
                    $rows_count = mysqli_num_rows($result_count);
                    echo $rows_count;
                ?>
                </td>
                <td><?php echo $product_status; ?></td>
                <td><a href='index.php?edit_products=<?php echo $product_id; ?>'>Editar</a></td>
                <td><a href='index.php?delete_product=<?php echo $product_id; ?>'>Remover</a></td>
            </tr>
            <?php
            }
            ?>
            
        </tbody>
    </table>
</body>
</html>
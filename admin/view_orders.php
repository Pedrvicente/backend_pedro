<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Encomendas</title>
</head>
<body>
    <h1 class="text-center">Ver Encomendas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Total</th>
                <th>Fatura</th>
                <th>Produtos</th>
                <th>Data</th>
                <th>Status</th>
                <th>Remover</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $select_orders = "SELECT * FROM `user_orders`";
            $result = mysqli_query($connect, $select_orders);
            $number = 0;
            while($row=mysqli_fetch_assoc($result)){
                $order_id = mysqli_real_escape_string($connect,$row['order_id']);
                $user_id = mysqli_real_escape_string($connect,$row['user_id']);
                $amount = mysqli_real_escape_string($connect,$row['amount']);
                $invoice_number = mysqli_real_escape_string($connect,$row['invoice_number']);
                $total_products = mysqli_real_escape_string($connect,$row['total_products']);
                $order_status = mysqli_real_escape_string($connect,$row['order_status']);
                $date = mysqli_real_escape_string($connect,$row['order_date']);
                $number++;
                ?>
                <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo $user_id;?></td>
                <td><?php echo $amount; ?></td>
                <td><?php echo $total_products; ?></td>
                <td><?php echo $date; ?></td>
                <td><?php echo $order_status; ?></td>
                <td><a href='index.php?delete_order=<?php echo $order_id; ?>'>Remover</a></td>
            </tr>
            <?php
            }
            ?>
            
        </tbody>
    </table>
</body>
</html>
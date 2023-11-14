<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encomendas</title>
</head>
<body>

    <?php

    $username = $_SESSION['username'];
    $get_user = "SELECT * FROM `user_table` WHERE username = '$username'";
    $result = mysqli_query($connect, $get_user);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id'];

    ?>
    <h3 class="text-center">As Minhas Encomendas</h3>
    <table class="table mt-5">
        <tr>
            <th>SN</th>
            <th>Total</th>
            <th>Produtos</th>
            <th>Fatura</th>
            <th>Data</th>
            <th>Completo/Incompleto</th>
            <th>Estado</th>
        </tr>

        <?php

        $get_order = "SELECT * FROM `user_orders` WHERE user_id='$user_id'";
        $result_orders = mysqli_query($connect, $get_order);
        $number = 1;
        while($row_data=mysqli_fetch_assoc($result_orders)){
            $order_id = $row_data['order_id'];
            $amount = $row_data['amount'];
            $total_products = $row_data['total_products'];
            $invoice_number = $row_data['invoice_number']; 
            $order_date = $row_data['order_date']; 
            $order_status = $row_data['order_status'];
            if($order_status=='pending'){
                $order_status = 'Incompleto'; 
            }else{
                $order_status = 'Completo';
            }
            

            echo"
            <tr>
                <td>$number</td>
                <td>$amount</td>
                <td>$total_products</td>
                <td>$invoice_number</td>
                <td>$order_date</td>
                <td>$order_status</td>
                <td><a href='confirm_payment.php'>Confirmar</a></td>
            </tr>
            ";

            $number++;
        }

        ?>

        <tbody>
            
        </tbody>
    </table>
</body>
</html>
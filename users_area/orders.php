<?php 

include('../includes/db.php');
include('../functions/common_function.php');


if(isset($_GET['user_id'])){
    $user_id = mysqli_real_escape_string($connect,$_GET['user_id']);

}



$fetch_ip = getIPAddress();
$total_price = 0;
$select_query_price = "SELECT * FROM `cart_details` WHERE ip_adress = '$fetch_ip'";
$result_cart_price = mysqli_query($connect, $select_query_price);
$invoice_number = mt_rand();
$status = 'pending';
$count_products = mysqli_num_rows($result_cart_price);
while($row_price = mysqli_fetch_assoc($result_cart_price)){
    $fetch_product_id = mysqli_real_escape_string($connect,$row_price['product_id']);
    $select_product = "SELECT * FROM `products` WHERE product_id = $fetch_product_id";
    $result_price = mysqli_query($connect, $select_product);
    while($row_product_price = mysqli_fetch_array($result_price)){
        $product_price = array(mysqli_real_escape_string($connect,$row_product_price['product_price']));
        $product_values = array_sum($product_price);
        $total_price += $product_values;
    }

}

$select_cart = "SELECT * FROM `cart_details`";
$result_cart = mysqli_query($connect, $select_cart);
$get_item_quantity = mysqli_fetch_array($result_cart);
$quantity = mysqli_real_escape_string($connect,$get_item_quantity['quantity']);
if($quantity == 0){
    $quantity = 1;
    $subtotal = $total_price;
}else{
    $quantity = $quantity;
    $subtotal = $total_price*$quantity;
}


$insert_orders = "INSERT INTO `user_orders` (user_id,amount, invoice_number,total_products, order_date, order_status) VALUES($user_id, $subtotal, $invoice_number, $count_products,NOW(),'$status')";
$result_query = mysqli_query($connect, $insert_orders);
if($result_query){
    echo "<script>alert('Encomenda feita com Sucesso')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}


$insert_pending_orders = "INSERT INTO `pending_orders` (user_id,invoice_number,product_id,quantity,order_status) VALUES($user_id,$invoice_number, $fetch_product_id,$quantity,'$status')";
$result_pending = mysqli_query($connect, $insert_pending_orders);


$empty_cart = "DELETE FROM `cart_details` WHERE ip_adress='$fetch_ip'";
$result_delete = mysqli_query($connect, $empty_cart);
 


?>
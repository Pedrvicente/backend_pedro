<?php
include('../includes/db.php');

function fetch_products(){
    global $connect;
    if(!isset($_GET['category'])){
        $select_query = "SELECT * FROM `products`  LIMIT 0,6";
        $fetch_products = mysqli_query($connect, $select_query);

        while( $row = mysqli_fetch_assoc($fetch_products)){
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $description = $row['product_description'];
          $product_id = $row['product_id'];
          $category_id = $row['category_id'];
          $product_image = $row['product_image'];
          $product_price = $row['product_price'];
          echo "
          <div class='col-md-4 mb-2'>
          <div class='card' style='width: 18rem;'>
            <img src='../images/$product_image' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$description</p>
              <p class='card-text'>Preço: $product_price</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-secondary' >View More</a>
            </div>
          </div>
        </div>
          ";
        }
      }
}


function categories(){
    global $connect;
    if(isset($_GET['category'])){

        $category_id = $_GET['category'];
        $select_query = "SELECT * FROM `products` WHERE category_id=$category_id";
        $fetch_products = mysqli_query($connect, $select_query);
        $num_products = mysqli_num_rows($fetch_products);
        if($num_products==0){
          echo "<h2>Sem Stock</h2>";
        }

        while( $row = mysqli_fetch_assoc($fetch_products)){
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $description = $row['product_description'];
          $product_id = $row['product_id'];
          $category_id = $row['category_id'];
          $product_image = $row['product_image'];
          $product_price = $row['product_price'];
          echo "
          <div class='col-md-4 mb-2'>
          <div class='card' style='width: 18rem;'>
            <img src='../images/$product_image' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$description</p>
              <p class='card-text'>Preço: $product_price</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
              <a href='#' class='btn btn-secondary' >View More</a>
            </div>
          </div>
        </div>
          ";
        }
      }
}


function fetch_categories(){
    global $connect;
    $select_categories =  "SELECT * FROM `categories`";
          $fetch_categories =  mysqli_query($connect, $select_categories);

          while($data = mysqli_fetch_assoc($fetch_categories)){
            $category_title = $data['category_title'];
            $category_id = $data['category_id'];

            echo "<li class='nav-item'>
            <a href='index.php?category=$category_id' class='nav-link'>$category_title</a>
          </li>";
          }
}


function product_details(){
    global $connect;
    if(isset($_GET['product_id'])){
        if(!isset($_GET['category'])){
            $product_id = $_GET['product_id'];
            $select_query = "SELECT * FROM `products`  WHERE product_id=$product_id";
            $fetch_products = mysqli_query($connect, $select_query);

            while( $row = mysqli_fetch_assoc($fetch_products)){
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $description = $row['product_description'];
            $product_id = $row['product_id'];
            $category_id = $row['category_id'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];
            echo "
            <div class='col-md-4 mb-2'>
            <div class='card' style='width: 18rem;'>
                <img src='../images/$product_image' class='card-img-top' alt='...'>
                <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$description</p>
                <p class='card-text'>Preço: $product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                </div>
            </div>
            </div>
            ";
            }
        }
    }
}



function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}   


function cart(){
  if(isset($_GET['add_to_cart'])){
    global $connect;
    $fetch_ip = getIPAddress();  
    $fetch_product_id = $_GET['add_to_cart'];
     $select_query = "SELECT * FROM `cart_details` WHERE ip_adress='$fetch_ip' AND product_id=$fetch_product_id";
     $result_query = mysqli_query($connect, $select_query);
     $num_rows = mysqli_num_rows($result_query);
         if($num_rows>0){
           echo "<script>alert('Item já está no carrinho');</script>";
           echo "<script>window.open('index.php', '_self');</script>";
         }else{
           $insert_query = "INSERT INTO `cart_details` (product_id, ip_adress, quantity) values ($fetch_product_id, '$fetch_ip', 0)";
           $result_query = mysqli_query($connect, $insert_query);
           echo "<script>alert('Item adicionado ao carrinho');</script>";
           echo "<script>window.open('index.php', '_self');</script>";
         }
       }
     }


function cart_number(){
  if(isset($_GET['add_to_cart'])){
    global $connect;
    $fetch_ip = getIPAddress();  
     $select_query = "SELECT * FROM `cart_details` WHERE ip_adress='$fetch_ip'";
     $result_query = mysqli_query($connect, $select_query);
     $cart_items = mysqli_num_rows($result_query);
         }else{
          global $connect;
          $fetch_ip = getIPAddress();  
           $select_query = "SELECT * FROM `cart_details` WHERE ip_adress='$fetch_ip'";
           $result_query = mysqli_query($connect, $select_query);
           $cart_items = mysqli_num_rows($result_query);
         }
         echo $cart_items;
       }



       function total_price(){
        global $connect;
        $fetch_ip = getIPAddress(); 
        $total_price = 0;
        $cart_query = "SELECT * FROM `cart_details` WHERE ip_adress='$fetch_ip'";
        $result_query = mysqli_query($connect, $cart_query);
        while($row= mysqli_fetch_array($result_query)){
          $product_id = $row['product_id'];
          $fetch_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
          $result_products = mysqli_query($connect, $fetch_products);
          while($row_price= mysqli_fetch_array($result_products)){
            $product_price = array($row_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price+=$product_values;
          }
          
        }
        echo $total_price;
       }


       function get_order_details(){
        global $connect;
        $username = $_SESSION['username'];
        $get_details = "SELECT * FROM `user_table` WHERE username='$username'";
        $result_query = mysqli_query($connect,$get_details);
        while($row_query = mysqli_fetch_array($result_query)){
          $user_id = $row_query['user_id'];
          if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
              if(!isset($_GET['delete_account'])){
                $get_orders = "SELECT * FROM `user_orders` WHERE user_id=$user_id AND order_status='pending'";
                $result_orders = mysqli_query($connect, $get_orders);
                $row_count = mysqli_num_rows($result_orders);
                if($row_count > 0){
                  echo "<h3 class='text-center'>Tens <span class='text-danger'>$row_count </span>Encomendas Pendentes</h3>
                <p class='text-center'><a href='profile.php?my_orders'>Detalhes das Encomendas</a></p>";
                }else{
                  echo "<h3 class='text-center'>Não tens encomendas pendentes</h3>
                <p class='text-center'><a href='../public/index.php'>Ir para página principal</a></p>";
                }
              }
            }
          }
        }
       }
?>
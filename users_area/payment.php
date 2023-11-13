<?php 
    include('../includes/db.php');
    include('../functions/common_function.php');

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
</head>
<body>
    <?php 
    
        $user_ip = getIPAddress();
        $select_user = "SELECT * FROM `user_table` WHERE user_ip = '$user_ip'";
        $result = mysqli_query($connect, $select_user);
        $run_query = mysqli_fetch_array($result);
        $user_id = $run_query['user_id'];
    
    ?>
    <div class="container">
        <h2>Opções de Pagamento</h2>
        <div class="justify-content-center">
            <div class="col-md-6 ">
                <a href="#"><img src="../images/mb-way.png" alt="" width="10%"></a>
            </div>
            <div class="col-md-6">
                <a href="#"><img src="../images/visa-symbol.png" alt="" width="10%"></a>
            </div>
            <div class="col-md-6">
                <a href="orders.php?user_id=<?php echo $user_id ?>">Pagamento Offline</a>
            </div>
            
        </div>
    </div>
</body>
</html>
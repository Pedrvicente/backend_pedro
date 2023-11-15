<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Utilizadores</title>
</head>
<body>
    <h1 class="text-center">Ver Utilizadores</h1>
    <table class="table">
        <thead>
            <tr>
                <th>User Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Morada</th>
                <th>Contacto</th>
                <th>Remover</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $select_user = "SELECT * FROM `user_table`";
            $result = mysqli_query($connect, $select_user);
            $number = 0;
            while($row=mysqli_fetch_assoc($result)){
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_email = $row['user_email'];
                $user_adress = $row['user_adress'];
                $user_mobile = $row['user_mobile'];
                $number++;
                ?>
                <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo $username;?></td>
                <td><?php echo $user_email; ?></td>
                <td><?php echo $user_adress; ?></td>
                <td><?php echo $user_mobile; ?></td>
                <td><a href='index.php?delete_user=<?php echo $user_id; ?>'>Remover</a></td>
            </tr>
            <?php
            }
            ?>
            
        </tbody>
    </table>
</body>
</html>
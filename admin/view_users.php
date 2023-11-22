<!DOCTYPE html>
<html lang="pt">
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
                $user_id = mysqli_real_escape_string($connect,$row['user_id']);
                $username = mysqli_real_escape_string($connect,$row['username']);
                $user_email = mysqli_real_escape_string($connect,$row['user_email']);
                $user_adress = mysqli_real_escape_string($connect,$row['user_adress']);
                $user_mobile = mysqli_real_escape_string($connect,$row['user_mobile']);
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
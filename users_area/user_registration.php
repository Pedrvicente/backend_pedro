<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registo de Utilizador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <div class="container-fluid">
        <h2 class="text-center">Criar Conta</h2>
        <div class="row">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" class="form-control" placeholder="Username" required name="username">
                    </div>
                    <div class="mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="text" id="user_email" class="form-control" placeholder="Email" required name="user_email">
                    </div>
                    <div class="mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Password" required name="user_password">
                    </div>
                    <div class="mb-4">
                        <label for="confirm_password" class="form-label">Confirmar Password</label>
                        <input type="password" id="confirm_password" class="form-control" placeholder="Confirmar Password" required name="confirm_password">
                    </div>
                    <div class="mb-4">
                        <label for="user_adress" class="form-label">Morada</label>
                        <input type="text" id="user_adress" class="form-control" placeholder="Morada" required name="user_adress">
                    </div>
                    <div class="mb-4">
                        <label for="user_mobile" class="form-label">Contacto</label>
                        <input type="text" id="user_mobile" class="form-control" placeholder="Contacto" required name="user_mobile">
                    </div>
                    <div>
                        <input type="submit" value="Registar" name="user_register">
                        <p>Já tem uma conta? <a href="user_login.php">Fazer Login</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
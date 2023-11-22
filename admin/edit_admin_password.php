<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Password</title>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="mb-4">
                        <label for="admin_name" class="form-label">Password Atual</label>
                        <input type="text" id="admin_name" class="form-control" placeholder="Password Atual" required name="old_password">
                    </div>
                    <div class="mb-4">
                        <label for="admin_email" class="form-label">Nova Password</label>
                        <input type="password" id="admin_email" class="form-control" placeholder="Nova Password" required name="new_password">
                    </div>
                    <div class="mb-4">
                        <label for="admin_password" class="form-label">Confirmar Nova Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Confirmar Password" required name="confirm_password">
                    </div>
                    <div>
                        <input type="submit" value="Registar" name="admin_register">
                        <p>Já tem uma conta? <a href="admin_login.php">Fazer Login</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
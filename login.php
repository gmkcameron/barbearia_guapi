<?php include 'includes/header.php'; ?>       

    <?php
    session_start();

    // Credenciais fixas do administrador
    $adminUsername = 'admin';
    $adminPassword = '123'; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Verifique as credenciais do administrador
        if ($username === $adminUsername && $password === $adminPassword) {
            $_SESSION['adminLoggedIn'] = true; // Define a sessão como verdadeira
            header('Location: admin/index.php');
            exit;
        } else {
            $error = "Credenciais inválidas";
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Admin</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Login</h1>
        <?php if (isset($error)) { ?>
            <p><?php echo $error; ?></p>
        <?php } ?>
        <form method="post" action="">
            <label for="username">Usuário:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Entrar</button>
        </form>
        <h3>
            <a href="index.php">Ir para Home</a>
        </h3>
    </body>
    </html>

<?php include 'includes/footer.php'; ?>
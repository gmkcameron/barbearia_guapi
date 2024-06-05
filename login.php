<?php include 'includes/header.php'; ?>       

<style>

<>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Corpo da página */
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0; /* Adicionado */
        }

        /* Cabeçalho */
        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            width: 100%; /* Adicionado */
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        /* Rodapé */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            margin-top: auto;
            width: 100%; /* Adicionado */
        }

        /* Seção principal */
        section {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex-grow: 1; /* Adicionado */
        }

        section h2 {
            margin-bottom: 20px;
            font-size: 2em;
            color: #333;
            text-align: center;
        }

        section p {
            margin-bottom: 10px;
            font-size: 1.2em;
            color: #555;
            text-align: center;
        }

        /* Estilo dos links */
        a {
            color: #333;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Botões */
        button {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 1.2em;
            color: #fff;
            background-color: #333;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
        }

        button:hover {
            background-color: #555;
        }    

        /* Estilos gerais */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header, footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 1em 0;
    }

    nav {
        background-color: #444;
        padding: 0.5em 0;
        text-align: center;
    }

    nav a {
        margin: 0 15px;
        text-decoration: none;
        color: #333;
    }

    nav a:hover {
        text-decoration: underline;
    }

    main {
        padding: 20px;
    }

    h2 {
        color: #333;
    }

</style>

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
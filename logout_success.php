<?php include 'includes/header.php'; ?>

<style>
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
    </style>

    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Logout - Sucesso</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Logout realizado com sucesso!</h1>
        <h3><a href="login.php">Fazer login novamente</a></h3>
        <h3><a href="index.php">Ir para Home</a></>
    </body>
    </html>

<?php include 'includes/footer.php'; ?>
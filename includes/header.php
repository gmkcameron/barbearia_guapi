<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbearia do Leone</title>
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
            padding: 20px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Cabeçalho */
        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        /* Navegação */
        nav {
            background-color: #444;
            padding: 10px 0;
            display: flex;
            justify-content: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2em;
            margin: 0 15px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        /* Rodapé */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            margin-top: auto;
        }

        /* Seção principal */
        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        main h2 {
            margin-bottom: 20px;
            font-size: 2em;
            color: #333;
            text-align: center;
        }

        main p {
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
</head>
<body>
    <header>
        <h1>Barbearia do Leone!</h1>
    </header>
    <nav>
        <a href="/barbearia_estacio/index.php">HOME</a>
        <a href="/barbearia_estacio/sobre.php">SOBRE MIM</a>
        <a href="/barbearia_estacio/localizacao.php">LOCALIZAÇÃO</a>
        <a href="/barbearia_estacio/servicos.php">SERVIÇOS</a>
        <a href="/barbearia_estacio/contato.php">CONTATO</a>
        <a href="/barbearia_estacio/schedule.php">AGENDAR</a>
        <a href="/barbearia_estacio/admin/index.php">ADMIN</a>
        <a href="/barbearia_estacio/login.php">Login</a>
        <a href="/barbearia_estacio/logout.php">Logout</a>
    </nav>
    <main>
</body>
</html>

<?php 
// Incluir o arquivo de conexão com o banco de dados
include 'includes/db.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Inserir a mensagem de contato no banco de dados usando PDO
    $sql = "INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'email' => $email, 'message' => $message]);

    // Verificar se a inserção foi bem-sucedida e exibir uma mensagem correspondente
    if ($stmt) {
        $success_message = "Mensagem enviada com sucesso!";
    } else {
        $error_message = "Ocorreu um erro ao enviar sua mensagem. Por favor, tente novamente mais tarde.";
    }
}
?>

<?php include 'includes/header.php'; ?>

<style>
    section {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    section h2 {
        margin-bottom: 20px;
        font-size: 2em;
        color: #333;
        text-align: center;
    }

    section form {
        display: flex;
        flex-direction: column;
    }

    section form label {
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }

    section form .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 15px;
    }

    section form .form-group label {
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }

    section form .form-group input,
    section form .form-group textarea {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1em;
        width: 100%;
    }

    section form .form-group textarea {
        height: 100px;
        resize: vertical;
    }

    section form button {
        padding: 10px;
        font-size: 1.2em;
        color: #fff;
        background-color: #333;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    section form button:hover {
        background-color: #555;
    }

    section p {
        text-align: center;
        font-size: 1.2em;
        color: green;
    }

    section .error_message {
        color: red;
    }
</style>

<section>
    <h2>Contato</h2>

    <?php if (isset($success_message)) { ?>
        <p><?php echo $success_message; ?></p>
    <?php } ?>

    <?php if (isset($error_message)) { ?>
        <p class="error_message"><?php echo $error_message; ?></p>
    <?php } ?>

    <form method="POST" action="contato.php">
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Mensagem:</label>
            <textarea id="message" name="message" required></textarea>
        </div>
        <button type="submit">Enviar</button>
    </form>
</section>

<?php include 'includes/footer.php'; ?>

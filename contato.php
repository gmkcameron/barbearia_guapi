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

<section>
    <h2>Contato</h2>

    <?php if (isset($success_message)) { ?>
        <p><?php echo $success_message; ?></p>
    <?php } ?>

    <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>

    <form method="POST" action="contato.php">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="message">Mensagem:</label>
        <textarea id="message" name="message" required></textarea>
        <br>
        <button type="submit">Enviar</button>
    </form>
</section>

<?php include 'includes/footer.php'; ?>

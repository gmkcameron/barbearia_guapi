<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>

<section>
    <h2>Contato</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Inserir a mensagem de contato no banco de dados
        $sql = "INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'email' => $email, 'message' => $message]);

        echo "<p>Mensagem enviada com sucesso!</p>";
    }
    ?>

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

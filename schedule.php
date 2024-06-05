<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>

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
    section form .form-group select {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1em;
        width: 100%;
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
    <h2>Agendamento de Horário</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];

        // Verificar se o horário já está ocupado
        $sql = "SELECT COUNT(*) FROM appointments WHERE appointment_date = :date";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['date' => $date]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            echo "<p>Este horário já está ocupado. Por favor, escolha outro horário.</p>";
        } else {
            // Inserir o novo agendamento
            $sql = "INSERT INTO appointments (client_name, client_phone, appointment_date) VALUES (:name, :phone, :date)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['name' => $name, 'phone' => $phone, 'date' => $date]);

            echo "<p>Agendamento realizado com sucesso!</p>";
        }
    }
    ?>

    <form method="POST" action="schedule.php">
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefone:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="date">Data e Hora:</label>
            <input type="datetime-local" id="date" name="date" required>
        </div>
        <button type="submit">Agendar</button>
    </form>
</section>

<?php include 'includes/footer.php'; ?>

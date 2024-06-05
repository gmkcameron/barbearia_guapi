<?php
// Inicie a sessão PHP
session_start();

// Verifique se o usuário não está autenticado como administrador
if (!isset($_SESSION['adminLoggedIn']) || $_SESSION['adminLoggedIn'] !== true) {
    // Se o usuário não estiver autenticado, redirecione-o para a página de login
    header('Location: ../login.php');
    exit; // Encerre o script para evitar que o restante da página seja carregado
}
?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/db.php'; ?>

<section style="display: flex; justify-content: space-between;">
    <div style="width: 65%;">
        <h2>Painel de Admin - Agendamentos</h2>

        <table border="1" width="100%">
            <tr>
                <th>ID</th>
                <th>Nome do Cliente</th>
                <th>Telefone</th>
                <th>Data do Agendamento</th>
                <th>Criado em</th>
            </tr>
            <?php
            $sql = "SELECT * FROM appointments";
            $stmt = $pdo->query($sql);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['client_name'] . "</td>";
                echo "<td>" . $row['client_phone'] . "</td>";
                echo "<td>" . $row['appointment_date'] . "</td>";
                echo "<td>" . $row['created_at'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <div style="width: 30%;">
        <h2>2 pessoas com mais agendamentos no mês - Dar R$10,00 de desconto</h2>

        <table border="1" width="100%">
            <tr>
                <th>Nome do Cliente</th>
                <th>Total de Agendamentos</th>
            </tr>
            <?php
            // Obter o mês atual
            $currentMonth = date('m');
            $currentYear = date('Y');



            // Consulta SQL para selecionar os clientes com mais agendamentos no mês atual
            $sql_top_clients = "SELECT client_name, COUNT(*) as total_appointments
                                FROM appointments
                                WHERE MONTH(appointment_date) = :currentMonth AND YEAR(appointment_date) = :currentYear
                                GROUP BY client_name
                                ORDER BY total_appointments DESC";
            $stmt_top_clients = $pdo->prepare($sql_top_clients);
            $stmt_top_clients->execute(['currentMonth' => $currentMonth, 'currentYear' => $currentYear]);

            // Loop através dos resultados e exibir os dados em uma tabela
            while ($row = $stmt_top_clients->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['client_name'] . "</td>";
                echo "<td>" . $row['total_appointments'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</section>

<section>
    <h2>Painel de Admin - Registros de Contato</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Mensagem</th>
            <th>Data de Envio</th>
        </tr>
        <?php
        // Consulta SQL para selecionar os registros de contato da tabela contacts
        $sql = "SELECT * FROM contacts";
        $stmt = $pdo->query($sql);

        // Loop através dos resultados e exibir os dados em uma tabela
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['message'] . "</td>";
            echo "<td>" . $row['created_at'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</section>

<?php include '../includes/footer.php'; ?>
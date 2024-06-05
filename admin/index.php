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
    <div style="width: 100%;">
        <h2>Painel de Admin - Agendamentos</h2>

        <!-- Formulário de Pesquisa -->
        <form method="GET" action="" style="display: flex; align-items: center;">
            <label for="client_name">Nome do Cliente:</label>
            <input type="text" id="client_name" name="client_name">
            <label for="appointment_date" style="margin-left: 10px;">Data do Agendamento:</label>
            <input type="date" id="appointment_date" name="appointment_date">
            <button type="submit" style="width: 100px; font-size: 14px; margin-bottom: 20px; margin-left: 10px">Pesquisar</button>
        </form>


        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome do Cliente</th>
                <th>Telefone</th>
                <th>Data do Agendamento</th>
                <th>Criado em</th>
            </tr>
            <?php
            // Inicializa as variáveis de filtro
            $clientName = isset($_GET['client_name']) ? $_GET['client_name'] : '';
            $appointmentDate = isset($_GET['appointment_date']) ? $_GET['appointment_date'] : '';

            // Cria a consulta SQL com os filtros
            $sql = "SELECT * FROM appointments WHERE 1=1";
            if (!empty($clientName)) {
                $sql .= " AND client_name LIKE :clientName";
            }
            if (!empty($appointmentDate)) {
                $sql .= " AND DATE(appointment_date) = :appointmentDate";
            }

            $stmt = $pdo->prepare($sql);

            // Bind dos parâmetros
            if (!empty($clientName)) {
                $stmt->bindValue(':clientName', '%' . $clientName . '%');
            }
            if (!empty($appointmentDate)) {
                $stmt->bindValue(':appointmentDate', $appointmentDate);
            }

            $stmt->execute();

            // Exibe os resultados
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

<div style="width: 30%;">
    <h2>Dar 10% desconto para clientes com mais de 3 agendamentos no mês</h2>

    <table border="1" width="100%">
        <tr>
            <th>Nome do Cliente</th>
            <th>Total de Agendamentos</th>
        </tr>
        <?php
        // Obter o mês atual
        $currentMonth = date('m');
        $currentYear = date('Y');

        // Consulta SQL para selecionar os clientes com três ou mais agendamentos no mês atual
        $sql_top_clients = "SELECT client_name, COUNT(*) as total_appointments
                            FROM appointments
                            WHERE MONTH(appointment_date) = :currentMonth AND YEAR(appointment_date) = :currentYear
                            GROUP BY client_name
                            HAVING COUNT(*) >= 3
                            ORDER BY total_appointments DESC";
        $stmt_top_clients = $pdo->prepare($sql_top_clients);
        $stmt_top_clients->execute(['currentMonth' => $currentMonth, 'currentYear' => $currentYear]);

        // Loop através dos resultados e exibir os dados em uma tabela
        while ($row = $stmt_top_clients->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td style='color: green;'>" . $row['client_name'] . "</td>";
            echo "<td>" . $row['total_appointments'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

<?php include '../includes/footer.php'; ?>

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

<section>
    <h2>Painel de Admin - Agendamentos</h2>

    <table border="1">
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
</section>

<?php include '../includes/footer.php'; ?>

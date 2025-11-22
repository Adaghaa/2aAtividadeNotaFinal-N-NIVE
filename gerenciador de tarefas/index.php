<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
    <h2>Lista de Tarefas</h2>

    <form method="POST" action="add_tarefa.php">
        <label>Descrição:</label>
        <input type="text" name="descricao" required>
        <label>Data de vencimento:</label>
        <input type="date" name="vencimento" required>
        <button type="submit">Adicionar</button>
    </form>

    <ul>
        <?php
        require "database.php";

        $result = $db->query("SELECT * FROM tarefas ORDER BY vencimento ASC");

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            echo "<li>";
            echo "ID: " . $row["id"] . " | ";
            echo "Descrição: " . $row["descricao"] . " | ";
            echo "Vencimento: " . $row["vencimento"] . " | ";
            echo "Status: " . ($row["concluida"] ? "Concluída" : "Pendente");

            if (!$row["concluida"]) {
                echo '
                    <form method="POST" action="update_tarefa.php" style="display:inline;">
                        <input type="hidden" name="id" value="' . $row["id"] . '">
                        <button type="submit">Concluir</button>
                    </form>
                ';
            }

            echo '
                <form method="POST" action="delete_tarefa.php" style="display:inline;">
                    <input type="hidden" name="id" value="' . $row["id"] . '">
                    <button type="submit">Excluir</button>
                </form>
            ';

            echo "</li>";
        }
        ?>
    </ul>
</body>
</html>

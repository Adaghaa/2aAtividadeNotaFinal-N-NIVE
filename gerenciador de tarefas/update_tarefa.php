<?php
require "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $stmt = $db->prepare("UPDATE tarefas SET concluida = 1 WHERE id = :id");
    $stmt->bindValue(":id", $id, SQLITE3_INTEGER);
    $stmt->execute();
}

header("Location: index.php");
exit;
?>

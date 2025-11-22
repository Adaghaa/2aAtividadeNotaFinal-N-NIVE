<?php
require "database.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id = $_POST["livro_id"] ?? null;

	if ($id) {
		$sql = "DELETE FROM livros WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("i", $id);

	if ($stmt->execute()) {
		echo "<p style='color:green;'>Livro deletado com sucesso!</p>";
	} else {
		echo "<p style='color:red;'>Erro ao deletar: " . $conn->error . "</p>";
	}
	$stmt->close();
	} else {
		echo "<p style='color:red;'>ID do livro não informado.</p>";
	}
	}

	$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Deletar Livro</title>
</head>
<body>
    <p><a href="index.php">Voltar ao catálogo</a></p>
</body>
</html>

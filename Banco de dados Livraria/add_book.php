<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Cadastrar Livro</title>
</head>
<body>
	<h2 style="color: darkblue;">Cadastrar Novo Livro</h2>

	<?php
	require "database.php"; // conexão com o banco

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$titulo = $_POST["titulo"] ?? null;
		$autor  = $_POST["autor"] ?? null;
		$ano    = $_POST["ano_publicacao"] ?? null;
	if ($titulo && $autor && $ano) {
		$sql = "INSERT INTO livros (titulo, autor, ano_publicacao) VALUES (?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssi", $titulo, $autor, $ano);

	if ($stmt->execute()) {
		echo "<p style='color:green;'>Livro cadastrado com sucesso!</p>";
	} else {
		echo "<p style='color:red;'>Erro ao cadastrar: " . $conn->error . "</p>";
	}

	$stmt->close();
	} else {
		echo "<p style='color:red;'>Preencha todos os campos.</p>";
		}
	}
	?>


	<form method="POST" action="add_book.php">
		<label>Título:</label><br>
		<input type="text" name="titulo" required><br><br>
		<label>Autor:</label><br>
		<input type="text" name="autor" required><br><br>
		<label>Ano de publicação:</label><br>
		<input type="number" name="ano_publicacao" required><br><br>

		<button type="submit">Cadastrar Livro</button>
	</form>

	<p><a href="index.php">Voltar ao catálogo</a></p>
</body>
</html>

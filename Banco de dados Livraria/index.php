<!DOCTYPE html>
	<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Página Inicial</title>
    	</head>
    	<body>
		<h2 style="color: darkblue;">Catálogo Livraria</h2>

		<ul>
			<?php
			require "database.php";
			$sql = "SELECT * FROM livros";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<li>";
					echo "ID: " . $row["id"] . "<br>";
					echo "Título: " . $row["titulo"] . "<br>";
					echo "Autor: " . $row["autor"] . "<br>";
					echo "Publicado em: " . $row["ano_publicacao"] . "<br>";

			echo ' <form method="POST" action="add_book.php">
				<input type="hidden" name="livro_id" value="' . $row["id"] . '">
				<button type = "submit">Adicionar</button>
				</form>';

			echo' <form method="POST" action="delete_book.php">
				<input type="hidden" name="livro_id" value="' . $row["id"] . '">
				<button type="submit">Deletar</button>
				</form>';
			echo"</li>";
			}
		} else {
			echo "<li>Nenhum livro encontrado.</li>";
		}
		$conn->close();
		?>
	</ul>
	</body>
</html>
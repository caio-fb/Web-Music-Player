<?php 
	require_once "Connection.php";

	$search = $_POST['search'];


	$db = Connection::getDb();
	$query = "SELECT nome, artista, curtida FROM musicas WHERE artista LIKE :search OR nome LIKE :search";
	$stmt = $db->prepare($query);
	$stmt->bindValue(":search", "%" . $search . "%");
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	// Exibindo os resultados
	foreach ($result as $row) {
	    $nome = $row['nome'];
	    $artista = $row['artista'];
	    $curtida = $row['curtida'];

	    // Faça o que desejar com os dados, por exemplo, exiba-os em HTML
	    echo "<p>Nome: $nome</p>";
	    echo "<p>Artista: $artista</p>";
	    echo "<p>Curtida: $curtida</p>";
	    echo "<hr>";
	}

?>
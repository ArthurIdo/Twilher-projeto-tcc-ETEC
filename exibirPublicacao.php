<?php

    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "twilher tcc";


$conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

    // Buscar as publicações
    $sql = "SELECT id, titulo, conteudo, data_publicacao FROM publicacoes ORDER BY data_publicacao DESC";
    $result = $conn->query($sql);

    // Exibir as publicações
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h2>" . $row['titulo'] . "</h2>";
        echo "<p>" . $row['conteudo'] . "</p>";
        echo "<small>Publicado em: " . $row['data_publicacao'] . "</small><hr>";
    }
} else {
    echo "Nenhuma publicação encontrada.";
}

    // Fechar conexão
    $conn->close();

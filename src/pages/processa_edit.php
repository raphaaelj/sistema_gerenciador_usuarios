<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['modalID'];
    $nome = $_POST['modalNome'];
    $email = $_POST['modalEmail'];
}

$sql = "UPDATE usuarios SET nome = ?, email = ? WHERE id = $id";

// $stmt = statement, aqui preparamos a Query, dessa forma evitamos injeção SQL.
if ($stmt = $connect->prepare($sql)) {

    // define os paramêtros, S = string, I = integer, B = boolean
    $stmt->bind_param('ss', $nome, $email);

    //Executa o statement
    if ($stmt->execute()) {
        header('Location: listar.php');
        exit;
    } else {
        echo "Erro ao atualizar o registro: " . $stmt->error;
        echo "<a href='listar.php'>Voltar</a>";
    }

    $stmt->close();
} else {
    echo "Método de requisição inválido.";
}
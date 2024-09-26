<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['deleteUserId'];
}

$sql = "DELETE FROM usuarios WHERE id = ?";

// $stmt = statement, aqui preparamos a Query, dessa forma evitamos injeção SQL.
if ($stmt = $connect->prepare($sql)) {

    // define os paramêtros, S = string, I = integer, B = boolean
    $stmt->bind_param('i', $id);

    //Executa o statement
    if ($stmt->execute()) {
        header('Location: listar.php');
        exit;
    } else {
        echo "Erro ao deletar o registro: " . $stmt->error;
        echo "<a href='listar.php'>Voltar</a>";
    }

    $stmt->close();
} else {
    echo "Método de requisição inválido.";
}
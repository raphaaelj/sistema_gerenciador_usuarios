<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['nome']) && !empty($_POST['email'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";

        if ($stmt = $connect->prepare($sql)) {
            $stmt->bind_param('ss', $nome, $email);

            if ($stmt->execute()) {
                header('Location: listar.php');
                exit;
            } else {
                echo "Erro ao inserir os dados: " . $stmt->error;
            }
        } else {
            $error = 1;
            header('Location: ../../index.php?error=' . $error);
            exit;
        }
    } else {
        $error = 1;
        header('Location: ../../index.php?error=' . $error);
        exit;

    }
}
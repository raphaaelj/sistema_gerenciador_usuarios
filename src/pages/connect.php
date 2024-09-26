<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadastro_usuarios";

$connect = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($connect->connect_error) {
    die(("Falha na conexão: ") . $connect->connect_error);
}
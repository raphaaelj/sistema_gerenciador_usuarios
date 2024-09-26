<?php

if (isset($_GET['error'])) {
    $error = $_GET['error'];
    switch ($error) {
        case 1:
            echo "<script>alert('ERRO: os campos não podem estar vazios!')</script>";
            break;
    }
} else {

}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <title>Registrar | Sistema Gerenciador de Usuário</title>
</head>

<body class="d-grid bg-primary bg-gradient vh-100">
    <main class="container m-auto text-center">
        <form action="src/pages/processa.php"
            class="d-flex flex-column align-items-center col-7 m-auto bg-light py-5 px-2 rounded" id="registerForm"
            method="POST">
            <!-- <h1 class="text-center fw-bold">Gerenciador <p class="fw-light fs-3">de</p> Usuários</h1> -->
            <svg width="100" height="100">
                <image href="src/assets/image/user-icon.svg" width="100" height="100"></image>
            </svg>
            <div class="d-grid justify-content-sm-center container">
                <div class="form-floating col col-sm m-1">
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome:">
                    <label for="nome" class="form-label">Nome</label>
                </div>
                <div class="form-floating col col-sm m-1">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email:">
                    <label for="email">Email</label>
                </div>
                <input type="submit" class="btn btn-outline-primary btn-sm col-sm-6 col-md-4 mx-auto"
                    form="registerForm" name="submit" id="submit" value="Cadastrar">
            </div>
        </form>
    </main>
    <footer class="text-center">
        <!-- (っ◔◡◔)っ ♥ ALL RIGHTS RESERVED TO Raphael José Silva de Oliveira ♥ -->
        <h6 class="">&copy; 2024 Raphael José Silva de Oliveira</h6> <!-- COPYRIGHT -->
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>

</html>
<?php
include 'processa.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>
    <title>Listagem | SGU</title>
</head>

<body class="bg-primary vh-100">
    <main class="container rounded text-center my-5">
        <table class="table table-bordered table-dark text-center">
            <thead>
                <h1 class="display-5 fw-bold text-white">Lista de Usuários Cadastrados:</h1>
            </thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th class="d-none d-md-block">Data de Registro</th>
                <th>Ações</th>
            </tr>
            <?php
            $sql = "SELECT id, nome, email, data_registro FROM usuarios";
            $result = $connect->query($sql);

            if ($result->num_rows > 0) {
                while ($user_data = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $user_data["id"] . "</td>
                        <td>" . $user_data["nome"] . "</td>
                        <td>" . $user_data["email"] . "</td>
                        <td class='d-none d-md-table-cell'>" . $user_data["data_registro"] . "</td>
                        <td class='gap-2 justify-content-center'>
                        <button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteModal' id='$user_data[id]' name='delButton'>Deletar</button>
                        <button class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#editModal' id='$user_data[id]' data-id='$user_data[id]' data-nome='$user_data[nome]' data-email='$user_data[email]'>Editar</button>
                        </td>
                    </tr>";
                }
                echo "<tr>
                        <td colspan='5'><a href='../../index.php' class='btn btn-primary'>Voltar</a></td>
                    </tr>";
            } else {
                echo "<tr>
                        <td colspan='5'>Nenhum usuário cadastrado. Melhore seu Marketing!</td>
                    </tr>
                    <tr>
                        <td colspan='5'><a href='../../index.php' class='btn btn-primary'>Voltar</a></td>
                    </tr>";
            }
            ?>
        </table>
        <div class="modal" id="editModal" tabindex="-1"> <!-- Modal para Editar dados -->
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Registro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="processa_edit.php" method="POST" id="editForm">
                        <div class="modal-body">
                            <div class="form-floating col col-sm m-1">
                                <input type="text" class="form-control" name="modalID" id="modalID" value=""
                                    placeholder="ID" readonly>
                                <label for="modalID" class="form-label">ID</label>
                            </div>
                            <div class="form-floating col col-sm m-1">
                                <input type='text' class='form-control' name='modalNome' id='modalNome'
                                    placeholder='Nome:' value=''>
                                <label for="modalNome" class="form-label">Nome</label>
                            </div>
                            <div class="form-floating col col-sm m-1">
                                <input type='email' class='form-control' name='modalEmail' id='modalEmail'
                                    placeholder='Email:' value=''>
                                <label for="modalEmail">Email</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" form="editForm" name="saveChanges"
                                id="saveChanges" data-bs-dismiss="modal">Salvar alterações</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal de confirmação de exclusão -->
        <div class="modal" id="deleteModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmar Exclusão</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="deleteForm" action="processa_del.php" method="POST">
                        <div class="modal-body">
                            <p>Tem certeza que deseja excluir este registro?</p>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="deleteUserId" id="deleteUserId" value=""
                                    readonly>
                                <label for="deleteUserId" class="form-label" placeholder="ID">ID</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" form="deleteForm" class="btn btn-danger">Deletar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="">
            <!-- (っ◔◡◔)っ ♥ ALL RIGHTS RESERVED TO Raphael José Silva de Oliveira ♥ -->
            <h6 class="">&copy; 2024 Raphael José Silva de Oliveira</h6>
        </footer>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>

</html>
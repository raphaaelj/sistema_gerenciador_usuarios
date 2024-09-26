// Esperar até que o DOM esteja completamente carregado
document.addEventListener('DOMContentLoaded', function() {
    // Selecionar todos os botões de edição
    editButtons = document.querySelectorAll('button[data-bs-target="#editModal"]');
    deleteButtons = document.querySelectorAll('button[name="delButton"]');

    // Para cada botão, adicionar um evento de clique
    editButtons.forEach((editButton) => {
        editButton.addEventListener('click', function() {
            // Obter os valores dos atributos data-id, data-nome e data-email
            userId = this.getAttribute('data-id');
            userName = this.getAttribute('data-nome');
            userEmail = this.getAttribute('data-email');

            // Preencher os campos do modal com os valores do usuário
            document.getElementById('modalID').value = userId;
            document.getElementById('modalNome').value = userName;
            document.getElementById('modalEmail').value = userEmail;
            console.log(`Botão clicado ${userId}`)
        });
    });

    deleteButtons.forEach((deleteButton) => {
        deleteButton.addEventListener('click', function() {
            userId = this.getAttribute('id');
            document.getElementById('deleteUserId').value = userId;
        })
    })
});
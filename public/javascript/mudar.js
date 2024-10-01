function bucarCidade() {
    const input = document.querySelector('#buscarCidade').value;
    window.location.href = `/cidade/buscar/${input}`;
}

function editarCidade(value) {
    window.location.href = `/cidade/editar/${value}`;
}

function excluirCidade(value) {
    window.location.href = `/cidade/excluir/${value}`;
}
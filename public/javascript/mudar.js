function bucarCidade() {
    const input = document.querySelector('#buscarCidade');
    window.location.href = `/cidade/buscar/${input.value}`;
}

function editarCidade(value) {
    window.location.href = `/cidade/editar/${value}`;
}

function excluirCidade(value) {
    window.location.href = `/cidade/exclur/${value}`;
}
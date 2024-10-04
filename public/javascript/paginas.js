function buscarCidade() {
    const input = document.querySelector('#buscarCidade').value;
    window.location.href = `/cidade/buscar/${input}`;
}

function buscarCliente() {
    const option = document.querySelector('#cliente');
    window.location.href = `/cliente/buscar/${option.value}`;
}

function editarCidade(value) {
    window.location.href = `/cidade/editar/${value}`;
}

function excluirCidade(value) {
    window.location.href = `/cidade/excluir/${value}`;
}

function pagina(pagina) {
    window.location = pagina;
}

function paginaDeLogin() {
    window.location = `/`;
}
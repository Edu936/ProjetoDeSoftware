/**
 * Cidades
 */
function editarCidade(value) {
    window.location.href = `/cidade/editar/${value}`;
}

function excluirCidade(value) {
    window.location.href = `/cidade/excluir/${value}`;
}

/**
 * Veiculos
 */
function buscarVeiculoCliente() {
    const selecVeiculoCliente = document.querySelector('#cliente');
    window.location
}

/**
 * Clientes
 */
function buscarCliente(value) {
    window.location.href = `/cliente/buscar/${value}`;
}

function editarCliente(value) {
    window.location.href = `/cliente/editar/${value}`;
}

function excluirCliente(value) {
    window.location.href = `/cliente/excluir/${value}`;
}

/**
 * Produtos
 */
function buscarProduto(value) {
    window.location.href = `/produto/buscar/${value}`;
}

function editarProduto(value) {
    window.location.href = `/produto/editar/${value}`;
}

function excluirProduto(value) {
    window.location.href = `/produto/excluir/${value}`;
}

/**
 * Serviços
 */
function buscarServico(value) {
    window.location.href = `/servico/buscar/${value}`;
}

function editarServico(value) {
    window.location.href = `/servico/buscar/${value}`;
}

function excluirServico(value) {
    window.location.href = `/servico/excluir/${value}`;
}

/**
 * Fornecedor
 */
function buscarFornecedor(value) {
    window.location.href = `/fornecedor/buscar/${value}`;
}

function editarFornecedor(value) {
    window.location.href = `/fornecedor/editar/${value}`;
}

function excluirFornecedor(value) {
    window.location.href = `/fornecedor/excluir/${value}`;
}

/**
 * Usuario
 */
function usuarioTelefone(value) {
    window.location.href = `/usuario/telefone/${value}`;
}

function usuarioEmail(value) {
    window.location.href = `/usuario/email/${value}`;
}

function usuarioEditar(value) {
    window.location.href = `/usuario/editar/${value}`;
}

function usuarioExcluir(value) {
    window.location.href = `/usuario/excluir/${value}`;
}
/**
 * Global
 */
function pagina(pagina) {
    window.location.href = pagina;
}
// Chamada de Pagina de Cidades
function editarCidade(value) {
    window.location.href = `/cidade/editar/${value}`;
}

function excluirCidade(value) {
    window.location.href = `/cidade/excluir/${value}`;
}

// Chamada de Pagina de Cliente
function buscarCliente(value) {
    window.location.href = `/cliente/buscar/${value}`;
}

function editarCliente(value) {
    window.location.href = `/cliente/editar/${value}`;
}

function excluirCliente(value) {
    window.location.href = `/cliente/excluir/${value}`;
}

// Chamda de Pagina de Produto

function buscarProduto(value) {
    window.location.href = `/produto/buscar/${value}`;
}

function buscarServico(value) {
    window.location.href = `/servico/buscar/${value}`;
}



function buscarFornecedor(value) {
    window.location.href = `/fornecedor/buscar/${value}`;
}

function buscarOrcamento(value) {
    window.location.href = `/orcamento/buscar/${value}`;
}

function buscarPedido(value) {
    window.location.href = `/pedido/buscar/${value}`;
}

function buscarVeiculo(value) {
    window.location.href = `/pedido/buscar/${value}`;
}

function buscarUsuario(value) {
    window.location.href = `/pedido/buscar/${value}`;

}

// Metodos De Edição


function editarOrcamento(value) {
    window.location.href = `/orcamento/editar/${value}`;
}

function editarPedido(value) {
    window.location.href = `/pedido/editar/${value}`;
}



function editarVeiculo(value) {
    window.location.href = `/veiculo/editar/${value}`;
}

function editarProduto(value) {
    window.location.href = `/produto/editar/${value}`;
}

function editarServico(value) {
    window.location.href = `/servico/editar/${value}`;
}

function editarFornecedor(value) {
    window.location.href = `/fornecedor/editar/${value}`;
}

// Medotos de Exclusão

function excluirProduto(value) {
    window.location.href = `/cidade/excluir/${value}`;
}

function excluirServico(value) {
    window.location.href = `/cidade/excluir/${value}`;
}



function excluirFornecedor(value) {
    window.location.href = `/cidade/excluir/${value}`;
}

function excluirOrcamento(value) {
    window.location.href = `/cidade/excluir/${value}`;
}

function excluirPedido(value) {
    window.location.href = `/cidade/excluir/${value}`;
}

// Metodo de Seleção
function selecionarOrcamento() {
    
}

function selecionarPediod() {
    
}


function selecionarVeiculo() {

}

function selecionarProduto() {

}

function selecionarServico() {

}

function selecionarFornecedor() {

}

// Metodo aciliar de Pagina
function pagina(pagina) {
    window.location.href = pagina;
}

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
let produtoCount = 1;
let servicoCount = 1;
let telefoneCount = 1;
let emailCount = 1;

function adicionarTelefone() {
    telefoneCount++;
    const telefoneDiv = document.getElementById('telefone');
    const novoTelefone = `
        <div class=\"telefone\">
            <div class=\"dados\">
                <label for=\"telefone\"> Telefone:</label>
                <input type=\"tel\" name=\"DS_FONE_USUARIO[]\" placeholder=\"Numero do Telefone\">
            </div>
        </div>`;
    telefoneDiv.insertAdjacentHTML('beforeend', novoTelefone);
}

function adicionarEmail() {
    emailCount++;
    const EmailDiv = document.getElementById('emails');
    const novoEmail = `
        <div class=\"emails\">
            <div class=\"dados\">
                <label for=\"emails\">Emails:</label>
                <input type=\"email\" name=\"DS_EMAIL_USUARIO[]\" placeholder=\"Endereço e-mail\">
            </div>
        </div>`;
    EmailDiv.insertAdjacentHTML('beforeend', novoEmail);
}

function adicionarProduto() {
    produtoCount++;
    const produtosDiv = document.getElementById('produtos');
    const novoProduto = `
        <div>
            <label for="produto${produtoCount}">Produto ${produtoCount}:</label>
            <input type="text" name="produtos[]" placeholder="Nome do produto">
            <label for="quantidade${produtoCount}">Quantidade:</label>
            <input type="number" name="quantidades[]" placeholder="Quantidade">
        </div>
    `;
    produtosDiv.insertAdjacentHTML('beforeend', novoProduto);
}

function adicionarServico() {
    servicoCount++;
    const servicosDiv = document.getElementById('servicos');
    const novoServico = `
        <div>
            <label for="servico${servicoCount}">Serviço ${servicoCount}:</label>
            <input type="text" name="servicos[]" placeholder="Nome do serviço">
            <label for="preco_servico${servicoCount}">Preço:</label>
            <input type="text" name="precos_servicos[]" placeholder="Preço do serviço">
        </div>
    `;
    servicosDiv.insertAdjacentHTML('beforeend', novoServico);
}
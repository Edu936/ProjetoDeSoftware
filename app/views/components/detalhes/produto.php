<h2 class="card-details-title">
    Detalhes do Produto
</h2>
<div class="card-details">
    <div class="card-content">
        <fieldset>
            <legend>Dados do Produto</legend>
            <p>Nome: <?=$produto->getNome()?></p>
            <p>Valor produto: <?=$produto->getValor()?></p>
            <p>Quantidade em Estoque: <?=$produto->getQuantidade()?></p>
        </fieldset>
        <fieldset>
            <legend>Serviços acossiados</legend>
            <p>Lavagem Detalhada</p>
            <p>Lavagem Detalhada</p>
            <p>Lavagem Detalhada</p>
            <p>Lavagem Detalhada</p>
            <p>Lavagem Detalhada</p>
            <p>Lavagem Detalhada</p>
            <p>Lavagem Detalhada</p>
            <p>Lavagem Detalhada</p>
            <p>Lavagem Detalhada</p>
        </fieldset>
        <fieldset>
            <legend>Fornecedores acossiados</legend>
            <p>Lava Rapido Exprez</p>
        </fieldset>
    </div>
    <div class="card-details-option">
        <button>Associar Serviço</button>
        <button>Associar Fornecedor</button>
        <button>Voltar</button>
    </div>
</div>
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
            <?php
            if($servicos) {
                foreach($servicos as $servico){
                    echo "<p>{$servico->getNome()}</p><br>";
                }
            } else {
                echo "<p>Esse produto não esta associado a nenhum serviço!</p>";
            }
            ?>
        </fieldset>
        <fieldset>
            <legend>Fornecedores acossiados</legend>
            <?php
            if($fornecedores) {
                foreach($fornecedores as $fornecedor){
                    echo "<p>{$fornecedor->getNome()}</p><br>";
                }
            } else {
                echo "<p>Esse produto não esta associado a nenhum fornecedor!</p>";
            }
            ?>
        </fieldset>
    </div>
    <div class="card-details-option">
        <!-- <button onclick="associarServico('<?=$produto->getCodigo()?>')">Associar Serviço</button> -->
        <!-- <button onclick="associarFornecedor('<?=$produto->getCodigo()?>')">Associar Fornecedor</button> -->
        <button onclick="inserirProduto('<?=$produto->getCodigo()?>')">Repor Estoque</button>
        <button onclick="debitarProduto('<?=$produto->getCodigo()?>')">Dar Baixa em Produto</button>
        <button onclick="pagina('<?=$link?>')">Voltar</button>
    </div>
</div>
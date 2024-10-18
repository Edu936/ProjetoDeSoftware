<h2 class="card-details-title">
    Detalhes do Orcamento
</h2>
<div class="card-details">
    <div class="card-content">
        <fieldset>
            <legend>Dados do Orcamento</legend>
            <p>Nome do Cliente: <?=$cliente->getNome()?></p>
            <p>Codigo do Orcamento: <?=$orcamento->getCodigo()?></p>
            <p>data: <?=$orcamento->getData()?></p>
            <p>Valor Total: R$ <?=$orcamento->getValor()?>,00</p>
        </fieldset>
        <fieldset>
            <legend>Serviços acossiados</legend>
            <?php
            if($servicos){
                foreach ($servicos as $servico) {
                    echo "<p>{$servico->getNome()}</p><br/>";
                }
            } else {
                echo "<p>Não a serviços associados a esse orçamento.</p>";
            }
            ?>
        </fieldset>
        <fieldset>
            <legend>Produtos acossiados</legend>
            <?php
            if($produtos) {
                foreach ($produtos as $produto) {
                    echo "<p>Produto: {$produto->getNome()}</p><br/>";
                }
            } else {
                echo "<p>Não a produtos associados a esse orçamento.</p>";
            }
            ?>
        </fieldset>
    </div>
    <div class="card-details-option">
        <button onclick="pagina('<?=$link?>')">Voltar</button>
    </div>
</div>
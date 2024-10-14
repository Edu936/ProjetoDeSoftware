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
            <p>Valor Total: <?=$orcamento->getValor()?></p>
        </fieldset>
        <fieldset>
            <legend>Serviços acossiados</legend>
            <?php
            foreach ($servicos as $servico) {
                echo "<p>{$servico->getNome()}</p><br/>";
            }
            ?>
        </fieldset>
        <fieldset>
            <legend>Produtos acossiados</legend>
            <?php
            foreach ($produtos as $produto) {
                echo "<p>{$produto->getNome()}</p><br/>";
            }
            ?>
        </fieldset>
    </div>
</div>
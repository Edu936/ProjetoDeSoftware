<h2 class="card-details-title">
    Detalhes do Pedido
</h2>
<div class="card-details">
    <div class="card-content">
        <fieldset>
            <legend>Dados do Orcamento</legend>
            <p>Nome do Cliente: <?=$cliente->getNome()?></p>
            <p>Codigo do Pedido: <?=$pedido->getCodigo()?></p>
            <p>Data: <?=$pedido->getData()?></p>
        </fieldset>
        <fieldset>
            <legend>Serviços acossiados</legend>
            <?php
            if($servicos){
                foreach ($servicos as $servico) {
                    echo "<p>Nome: {$servico->getNome()}</p> <p>Valor: R\$ {$servico->getValor()},00</p><br/>";
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
                    echo "<p>{$produto->getNome()}</p><br/>";
                }
            } else {
                echo "<p>Não a produtos associados a esse orçamento.</p>";
            }
            ?>
        </fieldset>
    </div>
    <div class="card-details-option">
        <button onclick="pagina('<?=$link?>')">Voltar</button>
        <button onclick="pagina('<?=$relatorio?>')">relatorio</button>
    </div>
</div>
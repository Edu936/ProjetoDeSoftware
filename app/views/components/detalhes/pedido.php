<h2 class="card-details-title">
    Detalhes do Pedido
</h2>
<div class="card-details">
    <div class="card-content">
        <fieldset>
            <legend>Dados do Pedido</legend>
            <p>Nome do Cliente: <?=$cliente->getNome()?></p>
            <p>Codigo do Pedido: <?=$pedido->getCodigo()?></p>
            <p>Data: <?=$pedido->getData()?></p>
            <p>Valor: R$ <?=$pedido->getValor()?>,00</p>
            <p>Desconto: R$ <?=$pedido->getDesconto()?>,00</p>
            <p>Pedido: R$ <?=$pedido->getValorLiquido()?>,00</p>
            <p>Forma de Pagamento: <?=$pedido->getTipoPagamento()?></p>
            <p>Parcelas: <?=$pedido->getParcelas()?>x</p>
        </fieldset>
        <fieldset>
            <legend>Serviços acossiados</legend>
            <?php
            if($servicos){
                foreach ($servicos as $servico) {
                    echo "<p>Nome: {$servico->getNome()}</p> <p>Valor: R\$ {$servico->getValor()},00</p><br/>";
                }
            } else {
                echo "<p>Não a serviços associados a esse pedido.</p>";
            }
            ?>
        </fieldset>
        <fieldset>
            <legend>Produtos acossiados</legend>
            <?php
            if($produtos) {
                foreach ($produtos as $produto) {
                    echo "<p>Nome: {$produto->getNome()}</p> <p>Valor: R\$ {$produto->getValor()},00</p><br/>";
                }
            } else {
                echo "<p>Não a produtos associados a esse orçamento.</p>";
            }
            ?>
        </fieldset>
    </div>
    <div class="card-details-option">
        <button onclick="pagina('<?=$link?>')">Voltar</button>
        <button onclick="pagamentosPedido('<?=$pedido->getCodigo()?>')">Pagamentos</button>
        <button onclick="relatorioPedido('<?=$pedido->getCodigo()?>')">relatorio</button>
        <button onclick="alterarStatus('<?=$pedido->getCodigo()?>')">Auterar Status</button>
    </div>
</div>
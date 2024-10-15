<div class="action-pedido">
    <button class="option-pedido" onclick="OrcamentosCliente('<?=$clienteSelecionado->getCodigo()?>')">Buscar orçamento do cliente</button>
    &nbsp;
    &nbsp;
    <button class="option-pedido" onclick="CadastrarPedidoNovo('<?=$clienteSelecionado->getCodigo()?>')">Criar um pedido novo</button>
    &nbsp;
    &nbsp;
    <p class="detalhe">Nome: <?= $clienteSelecionado->getNome() ?> &nbsp; CPF: <?= $clienteSelecionado->getCPF() ?></p>
</div>
<div class="form-pedido">
    <img src="/images/Car wash-rafiki.png">
</div>
<div class="action-pedido">
    <button class="option-pedido" onclick="OrcamentosCliente('<?=$cliente->getCodigo()?>')">Buscar orçamento do cliente</button>
    &nbsp;
    &nbsp;
    <button class="option-pedido">Criar um pedido novo</button>
    &nbsp;
    &nbsp;
    <p class="detalhe">Nome: <?= $cliente->getNome() ?> &nbsp; CPF: <?= $cliente->getCPF() ?></p>
</div>
<div class="form-pedido">
    <img src="/images/Car wash-rafiki.png">
</div>
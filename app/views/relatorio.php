<?php $this->layout('master', ['title' => $title]) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="/style/relatorio.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<?php $this->start('js') ?>
<script src="/javascript/paginas.js"></script>
<?php $this->stop() ?>

<div class="relatorio">
    <div class="relatorio-header">
        <button onclick="pagina('<?= $link ?>')">Voltar</button>
    </div>
    <div class="relatorio-body">
        <div class="detalhes-cliente">
            <h2 style="margin: 0%;">Relatorio da Venda # <?= $pedido->getCodigo() ?></h2>
            <fieldset>
                <legend>Cliente</legend>
                <p style="margin: 0%;">
                    <strong>Nome: </strong><?= $cliente->getNome() ?>
                    &nbsp;
                    &nbsp;
                    <strong>CPF: </strong><?= $cliente->getCPF() ?>
                    &nbsp;
                    &nbsp;
                    <strong>Telefone: </strong><?= $telefone[0]->getTelefone() ?>
                    &nbsp;
                    &nbsp;
                    <strong>Email: </strong><?= $email[0]->getTelefone() ?>
                </p><br>
                <fieldset style="padding-bottom: 0%;">
                    <legend>Endereço</legend>
                    <p style="margin-bottom: 5px;">
                        <strong>Numero: </strong><?= $cliente->getNumeroCasa() ?>°
                        &nbsp;
                        &nbsp;
                        <strong>Rua: </strong><?= $cliente->getRua() ?>
                        &nbsp;
                        &nbsp;
                        <strong>Bairro: </strong><?= $cliente->getBairro() ?>
                        &nbsp;
                        &nbsp;
                        <strong>Cidade: </strong><?= $cidade->getNome() ?>
                        &nbsp;
                        &nbsp;
                        <strong>CEP: </strong><?= $cliente->getCEP() ?>
                    </p><br>
                </fieldset>
            </fieldset>
        </div>
        <div class="detalhe-pedido" style="margin-top: 10px;">
            <fieldset>
                <legend>Veiculo</legend>
                <p style="margin: 0%;">
                    <strong>Modelo: </strong><?= $veiculo->getModelo() ?>
                    &nbsp;
                    &nbsp;
                    <strong>Placa: </strong><?= $veiculo->getPalca() ?>
                    &nbsp;
                    &nbsp;
                    <strong>Marca: </strong><?= $veiculo->getMarca() ?>
                    &nbsp;
                    &nbsp;
                    <strong>Porte: </strong><?= $veiculo->getPorte() ?>
                </p><br>
                <h4 style="margin: 0%;">Serviços e Produtos</h4>
                <table>
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Nome do Item</th>
                            <th>quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($produtos != []) {
                            foreach ($produtos as $p) {
                                echo "<tr>";
                                echo "<td>Produto</td>";
                                echo "<td>{$p->getNome()}</td>";
                                echo "<td>{$p->quantidadeProduto()}</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                        <?php
                        if ($servicos != []) {
                            foreach ($servicos as $s) {
                                echo "<tr>";
                                echo "<td>Serviço</td>";
                                echo "<td>{$s->getNome()}</td>";
                                echo "<td>1</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </fieldset>
        </div>
        <div class="detalhes-pagamentos" style="margin-top: 10px;">
            <fieldset>
                <legend>Pagamentos</legend>
                <p style="margin: 0%;">
                    <strong>Valor Total: R$ </strong><?= $pedido->getValor() ?>,00
                    &nbsp;
                    &nbsp;
                    <strong>Desconto: R$ </strong><?= $pedido->getDesconto() ?>,00
                    &nbsp;
                    &nbsp;
                    <strong>Valor Liquido: R$ </strong><?= $pedido->getValorLiquido() ?>,00
                    &nbsp;
                    &nbsp;
                    <strong>Forma de Pagamento: </strong><?= $pedido->getTipoPagamento() ?>
                    &nbsp;
                    &nbsp;
                    <strong>Numero de Parcelas: </strong><?= $pedido->getParcelas() ?>
                </p><br>
                <h4 style="margin: 0%;">Serviços e Produtos</h4>
                <table class="tabela">
                    <thead>
                        <tr>
                            <th>Valor Parcelas</th>
                            <th>Data Vencimento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            foreach ($parcelas as $p) {
                                echo "<tr>";
                                echo "<td>R$ {$p->getValor()},00</td>";
                                echo "<td>{$p->getVencimento()}</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </div>
    </div>
</div>
<h1 class="title">Controle de Parcelas</h1>
<button onclick="pagina('<?=$link?>')">Voltar</button>
<div class="table">
    <table>
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Valor da Parcela</th>
                <th scope="col">Data Vencimento</th>
                <th scope="col">Data Pagamento</th>
                <th scope="col">Status</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($parcelas as $parcela) {
                echo "<tr>";
                echo "<td>{$parcela->getCodigo()}</td>";
                echo "<td>R$ {$parcela->getValor()},00</td>";
                echo "<td>{$parcela->getVencimento()}</td>";
                echo "<td>{$parcela->getPagamento()}</td>";
                echo "<td>{$parcela->getStatus()}</td>";
                echo "<td><button onclick=\"pagarParcela({$parcela->getCodigo()})\">Pagar</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
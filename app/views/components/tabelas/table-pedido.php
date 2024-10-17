<h1>Controle de Pedidos</h1>
<div class="table">
    <table>
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Cliente</th>
                <th scope="col">Data</th>
                <th scope="col">Preço Final</th>
                <th scope="col">Status</th>
                <th scope="colgroup">Ações</th>
            </tr>
        </thead>
        <tbody >
            <?php
            foreach ($pedidos as $pedido) {
                echo "<tr>";
                echo "<td>{$pedido->getCodigo()}</td>";
                echo "<td>{$pedido->NM_CLIENTE}</td>";
                echo "<td>{$pedido->getData()}</td>";
                echo "<td>R\$ {$pedido->getValorLiquido()},00</td>";
                echo "<td>{$pedido->getStatus()}</td>";
                echo "<td><button onclick=\"detalhePedido({$pedido->getCodigo()})\">Detalhes</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
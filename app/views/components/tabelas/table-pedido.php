<h1>Controle de Pedidos</h1>
<div class="table">
    <table>
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Data</th>
                <th scope="col">Preço Pedido</th>
                <th scope="col">Status</th>
                <th scope="colgroup" colspan="3">Ações</th>
            </tr>
        </thead>
        <tbody >
            <?php
            foreach ($pedidos as $pedidos) {
                echo "<tr>";
                echo "<td>{$pedidos->getCodigo()}</td>";
                echo "<td>{$pedidos->getData()}</td>";
                echo "<td>R\${$pedidos->getValor()},00</td>";
                echo "<td>{$pedidos->getQuantidade()}</td>";
                echo "<td><button onclick=\"editarPedidos({$pedidos->getCodigo()})\">Editar</button></td>";
                echo "<td><button onclick=\"buscarPedidos({$pedidos->getCodigo()})\">Detalhes</button></td>";
                echo "<td><button onclick=\"excluirPedidos({$pedidos->getCodigo()})\">Excluir</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
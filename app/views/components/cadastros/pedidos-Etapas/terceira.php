<div class="table">
    <table>
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Data</th>
                <th scope="col">Valor</th>
                <th scope="colgroup" colspan="3">Ações</th>
            </tr>
        </thead>
        <tbody >
            <?php
            if($orcamentos){
                foreach ($orcamentos as $orcamento) {
                    echo "<tr>";
                    echo "<td>{$orcamento->getCodigo()}</td>";
                    echo "<td>{$orcamento->getData()}</td>";
                    echo "<td>R\${$orcamento->getValor()},00</td>";
                    echo "<td><button onclick=\"OrcamentoPedidoDetalhe({$orcamento->getCodigo()})\">Detalhes</button></td>";
                    echo "<td><button onclick=\"criarPedidoOrcamento({$orcamento->getCodigo()})\">Usar como base</button></td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>
<h1>Controle de Serviços</h1>
<div class="table">
    <table>
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Serviços</th>
                <th scope="col">Valor</th>
                <th scope="colgroup" colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($servicos as $servico) {
                echo "<tr>";
                echo "<td>{$servico->getCodigo()}</td>";
                echo "<td class=\"dadoCidade\">{$servico->getNome()}</td>";
                echo "<td class=\"dadoCidade\">R\$ {$servico->getValor()},00</td>";
                echo "<td><button onclick=\"editarServico({$servico->getCodigo()})\">Editar</button></td>";
                echo "<td><button onclick=\"excluirServico({$servico->getCodigo()})\">Excluir</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
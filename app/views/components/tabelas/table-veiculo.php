<h1 class="title">Controle de Veiculos</h1>
<div class="table">
    <table>
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Placa</th>
                <th scope="col">Modelso</th>
                <th scope="col">Cliente</th>
                <th scope="colgroup" colspan="3">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($veiculos as $veiculo) {
                echo "<tr>";
                echo "<td>{$veiculo->getCodigo()}</td>";
                echo "<td>{$veiculo->getPalca()}</td>";
                echo "<td>{$veiculo->getModelo()}</td>";
                echo "<td>{$veiculo->NM_CLIENTE}</td>";
                echo "<td><button onclick=\"buscarVeiculo({$veiculo->getCodigo()})\">Editar</button></td>";
                echo "<td><button onclick=\"editarVeiculo({$veiculo->getCodigo()})\">Detalhes</button></td>";
                echo "<td><button onclick=\"excluirVeiculo({$veiculo->getCodigo()})\">Excluir</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
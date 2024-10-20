<h1 class="title">Controle de Cidades</h1>
<div class="table">
    <table>
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="colgroup" colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($cidades as $cidade) {
                echo "<tr>";
                echo "<td>{$cidade->getCodigo()}</td>";
                echo "<td class=\"dadoCidade\">{$cidade->getNome()}</td>";
                echo "<td class=\"dadoCidade\">{$cidade->getEstado()}</td>";
                echo "<td><button onclick=\"editarCidade({$cidade->getCodigo()})\">Editar</button></td>";
                echo "<td><button onclick=\"excluirCidade({$cidade->getCodigo()})\">Excluir</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
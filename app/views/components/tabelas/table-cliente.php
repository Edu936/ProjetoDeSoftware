<h1 class="title">Controle de Clientes</h1>
<div class="table">
    <table>
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="colgroup" colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($clientes as $cliente) {
                echo "<tr>";
                echo "<td>{$cliente->getCodigo()}</td>";
                echo "<td>{$cliente->getNome()}</td>";
                echo "<td>{$cliente->getCPF()}</td>";
                // echo "<td><button onclick=\"buscarCliente({$cliente->getCodigo()})\">Dados</button></td>";
                echo "<td><button onclick=\"editarCliente({$cliente->getCodigo()})\">Editar</button></td>";
                echo "<td><button onclick=\"excluirCliente({$cliente->getCodigo()})\">Excluir</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
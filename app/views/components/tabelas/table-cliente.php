<div class="controller">

</div>
<div class="table">
    <table>
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="colgroup" colspan="3">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($clientes as $cliente) {
                echo "<tr>";
                echo "<td>{$cliente->getCodigo()}</td>";
                echo "<td>{$cliente->getNome()}</td>";
                echo "<td>{$cliente->getCPF()}</td>";
                echo "<td><button >Dados</button></td>";
                echo "<td><button >Editar</button></td>";
                echo "<td><button >Excluir</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
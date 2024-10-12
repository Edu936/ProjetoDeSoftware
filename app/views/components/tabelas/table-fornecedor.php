<h1>Controle de Fornecedores</h1>
<div class="table">
    <table>
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nome</th>
                <th scope="col">CNPJ</th>
                <th scope="colgroup" colspan="3">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($fornecedores as $fornecedor) {
                echo "<tr>";
                echo "<td>{$fornecedor->getCodigo()}</td>";
                echo "<td>{$fornecedor->getNome()}</td>";
                echo "<td>{$fornecedor->getCNPJ()}</td>";
                echo "<td><button onclick=\"editarFornecedor({$fornecedor->getCodigo()})\">Editar</button></td>";
                echo "<td><button onclick=\"buscarFornecedor({$fornecedor->getCodigo()})\">Detalhes</button></td>";
                echo "<td><button onclick=\"excluirFornecedor({$fornecedor->getCodigo()})\">Excluir</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
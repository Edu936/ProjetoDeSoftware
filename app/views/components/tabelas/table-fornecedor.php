<div class="controller">
    
</div>
<div class="table">
    <table>
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nome</th>
                <th scope="col">CNPJ</th>
                <th scope="col">Cidade</th>
                <th scope="col">Telefone</th>
                <th scope="col">Email</th>
                <th scope="colgroup" colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($fornecedores as $fornecedor) {
                echo "<tr>";
                echo "<td>{$fornecedor->getCodigo()}</td>";
                echo "<td>{$fornecedor->getNome()}</td>";
                echo "<td>{$fornecedor->getCNPJ()}</td>";
                echo "<td>{$fornecedor->NM_CIDADE}</td>";
                echo "<td>{$fornecedor->DS_FONE_FORNECEDOR}</td>";
                echo "<td>{$fornecedor->DS_EMAIL_FORNECEDOR}</td>";
                echo "<td><button >Editar</button></td>";
                echo "<td><button >Excluir</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
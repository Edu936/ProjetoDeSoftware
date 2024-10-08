<div class="controller">
  
</div>
<div class="table">
    <table>
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Produtos</th>
                <th scope="col">Valor</th>
                <th scope="col">Quantidade</th>
                <th scope="colgroup" colspan="3">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($servicos as $servico) {
                echo "<tr>";
                echo "<td>{$servico->getCodigo()}</td>";
                echo "<td class=\"dadoCidade\">{$servico->getNome()}</td>";
                echo "<td><button >Editar</button></td>";
                echo "<td><button >Excluir</button></td>";
                echo "<td><button >Dados</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
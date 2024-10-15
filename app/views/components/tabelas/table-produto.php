<h1>Controle de Produto</h1>
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
        <tbody >
            <?php
            foreach ($produtos as $produto) {
                echo "<tr>";
                echo "<td>{$produto->getCodigo()}</td>";
                echo "<td class=\"dadoCidade\">{$produto->getNome()}</td>";
                echo "<td class=\"dadoCidade\">R\${$produto->getValor()},00</td>";
                echo "<td class=\"dadoCidade\">{$produto->getQuantidade()} unidade</td>";
                echo "<td><button onclick=\"editarProduto({$produto->getCodigo()})\">Editar</button></td>";
                echo "<td><button onclick=\"buscarProduto({$produto->getCodigo()})\">Detalhes</button></td>";
                echo "<td><button onclick=\"excluirProduto({$produto->getCodigo()})\">Excluir</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
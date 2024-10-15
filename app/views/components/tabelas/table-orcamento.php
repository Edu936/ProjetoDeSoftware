<h1>Controle de Orçamentos</h1>
<div class="search">
    <button onclick="pagina('<?=$link?>')">voltar</button>
    &nbsp;
    &nbsp;  
    <select id="cliente-orcamento">
        <?php
        echo "<option value=\"null\" selected>Selecione o Cliente</option>";
        foreach ($clientes as $cliente) {
            echo "<option class=\"option\"  value=\"{$cliente->getCodigo()}\">{$cliente->getNome()}</option>";
        }
        ?>
    </select>
    &nbsp;
    &nbsp;
    <button onclick="buscarOrcamentosCliente()">Buscar Dados</button>
</div>
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
                    echo "<td><button onclick=\"editarProduto({$orcamento->getCodigo()})\">Editar</button></td>";
                    echo "<td><button onclick=\"buscarProduto({$orcamento->getCodigo()})\">Detalhes</button></td>";
                    echo "<td><button onclick=\"excluirProduto({$orcamento->getCodigo()})\">Excluir</button></td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>
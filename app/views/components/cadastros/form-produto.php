<div class="card">
    <h1>Cadastro de Produtos</h1>
    <form action="/produto/salvar" method="post" autocomplete="off">
        <div class="dados">
            <label for="name">Nome do Produto:</label><br />
            <input type="text" name="NM_PRODUTO" id="name" placeholder="Usuário" required />
        </div>
        <div class="dados">
            <label for="valor">Valor do Produto:</label><br />
            <input type="number" name="VL_PRODUTO" id="valor" placeholder="Valor" required />
        </div>
        <div class="dados">
            <label for="quantidade">Quantidade Inicial:</label><br />
            <input type="number" name="QTD_PRODUTO" id="quantidade" placeholder="Quantidade"/>
        </div>
        <div class="dados">
                <label for="fornecedor">Fornecedor:</label><br />
                <select name="CD_FORNECEDOR" id="fornecedor">
                    <?php
                    foreach ($fornecedores as $fornecedor) {
                        echo "<option value=\"{$fornecedor->getCodigo()}\">{$fornecedor->getNome()}</option>";
                    }
                    ?>
                </select>
            </div>
        <div class="submit">
            <input type="reset" value="Limpar" />
            &nbsp;
            <input type="submit" value="Cadastrar" />
        </div>
    </form>
</div>
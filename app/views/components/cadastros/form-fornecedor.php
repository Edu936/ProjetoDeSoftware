<div class="card">
    <h1><?= $card ?></h1>
    <form action="<?= $route ?>" method="post" autocomplete="off">
        <fieldset>
            <legend>Fornecedor</legend>
            <div class="dados">
                <label for="name">Nome do Fornecedor:</label><br />
                <?php echo "<input type=\"text\" name=\"NM_FORNECEDOR\" id=\"name\" placeholder=\"Fornecedor\" required  value=\"{$fornecedor->getNome()}\"/>" ?>
            </div>
            <div class="dados">
                <label for="CNPJ">CNPF do Fornecedor:</label><br />
                <?php echo "<input type=\"text\" name=\"DS_CNPJ_FORNECEDOR\" id=\"CNPJ\" placeholder=\"CNPJ do Fornecedor\" required  value=\"{$fornecedor->getCNPJ()}\"/>" ?>
            </div>
        </fieldset>
        <fieldset>
            <legend>Endereço</legend>
            <div class="dados">
                <label for="numero">Numero:</label><br />
                <input type="number" name="DS_NUMERO" id="numero" placeholder="Numero da casa ou apartamento" required />
            </div>
            <div class="dados">
                <label for="rua">Rua:</label><br />
                <input type="text" name="DS_RUA" id="rua" placeholder="Numero da casa ou apartamento" required />
            </div>
            <div class="dados">
                <label for="bairro">Bairro:</label><br />
                <input type="text" name="DS_BAIRRO" id="bairro" placeholder="Numero da casa ou apartamento" required />
            </div>
            <div class="dados">
                <label for="CEP">CEP:</label><br />
                <input type="text" name="DS_CEP" id="CEP" placeholder="Numero da casa ou apartamento" required />
            </div>
            <div class="dados">
                <label for="cidade">Cidade:</label><br />
                <select name="CD_CIDADE" id="cidade">
                    <?php
                    foreach ($cidades as $cidade) {
                        echo "<option value=\"{$cidade->getCodigo()}\">{$cidade->getNome()}</option>";
                    }
                    ?>
                </select>
            </div>
        </fieldset>
        <div class="submit">
            <input type="reset" value="Limpar" />
            &nbsp;
            <input type="submit" value="Cadastrar" />
        </div>
    </form>
</div>
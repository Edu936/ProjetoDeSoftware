<div class="card">
    <h1><?=$card?></h1>
    <form action="<?=$route?>" method="post" autocomplete="off">
        <div class="dados">
            <label for="name">Nome do Fornecedor:</label><br />
            <?php echo "<input type=\"text\" name=\"NM_FORNECEDOR\" id=\"name\" placeholder=\"Fornecedor\" required  value=\"{$fornecedor->getNome()}\"/>" ?>
        </div>
        <div class="dados">
            <label for="CNPJ">CNPF do Fornecedor:</label><br />
            <?php echo "<input type=\"text\" name=\"DS_CNPJ_FORNECEDOR\" id=\"CNPJ\" placeholder=\"CNPJ do Fornecedor\" required  value=\"{$fornecedor->getCNPJ()}\"/>" ?>
        </div>
        <div class="dados">
            <label for="cidade">Cidade:</label><br />
            <select name="CD_CIDADE" id="cidade">
                <?php
                    foreach($cidades as $cidade) {
                        echo "<option value=\"{$cidade->getCodigo()}\">{$cidade->getNome()}</option>";
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
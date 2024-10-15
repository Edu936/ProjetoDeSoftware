<div class="card-grande">
    <h1>Atualização de Fornecedor</h1>
    <form action="/fornecedor/atualizar/<?=$fornecedor->getCodigo()?>" method="post" autocomplete="off">
        <fieldset>
            <legend>Fornecedor</legend>
            <div class="dados">
                <label for="name">Nome do Fornecedor:</label><br />
                <input type="text" name="NM_FORNECEDOR" id="name" required  value="<?=$fornecedor->getNome()?>"/>
            </div>
            <div class="dados">
                <label for="CNPJ">CNPJ do Fornecedor:</label><br />
                <input type="text" name="DS_CNPJ_FORNECEDOR" id="CNPJ" required  value="<?=$fornecedor->getCNPJ()?>"/>
            </div>
        </fieldset>
        <fieldset>
            <legend>Endereço</legend>
            <div class="dados">
                <label for="numero">Numero:</label><br />
                <input type="number" name="DS_NUMERO" id="numero" value="<?=$fornecedor->getNumero()?>" required />
            </div>
            <div class="dados">
                <label for="rua">Rua:</label><br />
                <input type="text" name="DS_RUA" id="rua" value="<?=$fornecedor->getRua()?>" required />
            </div>
            <div class="dados">
                <label for="bairro">Bairro:</label><br />
                <input type="text" name="DS_BAIRRO" id="bairro" value="<?=$fornecedor->getBairro()?>" required />
            </div>
            <div class="dados">
                <label for="CEP">CEP:</label><br />
                <input type="text" name="DS_CEP" id="CEP" value="<?=$fornecedor->getCEP()?>" required />
            </div>
            <div class="dados">
                <label for="cidade">Cidade:</label><br />
                <select name="CD_CIDADE" id="cidade">
                    <?php
                    foreach ($cidades as $cidade) {
                        // if($cidade->getCodigo() != $fornecedor->getCidade()){
                        //     echo "<option value=\"{$cidade->getCodigo()}\" selected>{$cidade->getNome()}</option>";
                        // }
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
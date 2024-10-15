<div class="card-grande">
    <h1>Atualização de Cliente</h1>
    <form action="/cliente/atualizar/<?=$cliente->getCodigo()?>" method="post" autocomplete="off">
        <fieldset>
            <legend>Cliente</legend>
            <div class="dados">
                <label for="name">Nome do Cliente:</label><br />
                <input type="text" name="NM_CLIENTE" id="name" value="<?=$cliente->getNome()?>" required />
            </div>
            <div class="dados">
                <label for="CPF">Numero do CPF:</label><br />
                <input type="text" name="DS_CPF_CLIENTE" id="CPF" value="<?=$cliente->getCPF()?>" required />
            </div>
        </fieldset>
        <fieldset>
            <legend>Endereço</legend>
            <div class="dados">
                <label for="numero">Numero:</label><br />
                <input type="number" name="DS_NUMERO" id="numero" value="<?=$cliente->getNumeroCasa()?>" required />
            </div>
            <div class="dados">
                <label for="rua">Rua:</label><br />
                <input type="text" name="DS_RUA" id="rua" value="<?=$cliente->getRua()?>" required />
            </div>
            <div class="dados">
                <label for="bairro">Bairro:</label><br />
                <input type="text" name="DS_BAIRRO" id="bairro" value="<?=$cliente->getBairro()?>" required />
            </div>
            <div class="dados">
                <label for="CEP">CEP:</label><br />
                <input type="text" name="DS_CEP" id="CEP" value="<?=$cliente->getCEP()?>" required />
            </div>
            <div class="dados">
                <label for="cidade">Cidade:</label><br />
                <select name="CD_CIDADE" id="cidade">
                    <?php 
                    foreach ($cidades as $cidade) {
                        if($cidade->getCodigo() == $cliente->getCidade()){
                            echo "<option value=\"{$cidade->getCodigo()}\" selected>{$cidade->getNome()}</option>";
                        }
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
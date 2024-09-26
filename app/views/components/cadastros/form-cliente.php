<div class="card">
    <h1>Dados Pessoais</h1>
    <form action="/cliente/salvar" method="post" autocomplete="off">
        <div class="dados">
            <label for="name">Nome do Cliente:</label><br />
            <input type="text" name="NM_CLIENTE" id="name" placeholder="Digite o nome" required />
        </div>
        <div class="dados">
            <label for="CPF">Numero do CPF:</label><br />
            <input type="text" name="DS_CPF_CLIENTE" id="CPF" placeholder="Digite o CPF" required />
        </div>
        <h1>Endereço</h1>
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
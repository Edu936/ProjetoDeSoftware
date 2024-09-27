<?php $this->layout('master', ['title' => 'Novo Usuario']) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/sign-in.css">
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="/style/card.css">
<?php $this->stop() ?>

<div class="card">
    <h1>cadastro de Usuarido</h1>
    <form action="usuario/salvar" method="post">
        <div class="dados">
            <label for="nome">Nome:</label>
            <input type="text" name="NM_USUARIO" id="nome"><br>
        </div>
        <div class="dados">
            <label for="">CPF:</label>
            <input type="text" name="" id=""><br>
        </div>
        <fieldset>
            <legend>Dados de Acesso</legend>
            <div class="dados">
                <label for="">User:</label>
                <input type="text" name="" id=""><br>
            </div>
            <div class="dados">
                <label for="">Senha:</label>
                <input type="text" name="" id=""><br>
            </div>
            <label for="">Cargo:</label>
            <div class="">
                <input type="radio" name="cargo" id="adm">
                <label for="adm">Administrador</label>
    
                <input type="radio" name="cargo" id="atd">
                <label for="atd">Atendente</label>
            </div>
        </fieldset>
        <fieldset>
            <legend>Endereço</legend>
            <div class="dados">
                <label for="">Numero:</label>
                <input type="text" name="" id=""><br>
            </div>
            <div class="dados">
                <label for="">Rua:</label>
                <input type="text" name="" id=""><br>
            </div>
            <div class="dados">
                <label for="">Bairro:</label>
                <input type="text" name="" id=""><br>
            </div>
            <div class="dados">
                <label for="">CEP:</label>
                <input type="text" name="" id=""><br>
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
        </fieldset>

        <div class="submit">
            <input type="reset" value="Limpar" />
            &nbsp;
            <input type="submit" value="Cadastrar" />
        </div>
    </form>
</div>
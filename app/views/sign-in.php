<?php $this->layout('master', ['title' => 'Cadastra-se']) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/sign-in.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<main>
    <div class="header-form">
        <button onclick="paginaDeLogin()">
            <i class="bi bi-arrow-left"></i>
            voltar
        </button>
        <h1>Cadastro de Usuario</h1>
    </div>
    <div class="form-user">
        <form action="/usuario/salvar" method="post">
            <fieldset>
                <legend>Dados Pessoais</legend>
                <div class="dados">
                    <label for="nome">Nome:</label>
                    <input type="text" name="NM_USUARIO" id="nome" required><br>
                </div>
                <div class="dados">
                    <label for="CPF">CPF:</label>
                    <input type="text" name="DS_CPF_USUARIO" id="CPF" required><br>
                </div>
            </fieldset>
            <fieldset>
                <legend>Dados de Acesso</legend>
                <div class="dados">
                    <label for="user">User:</label>
                    <input type="text" name="DS_USUARIO_USER" id="user" required><br>
                </div>
                <div class="dados">
                    <label for="password">Senha:</label>
                    <input type="password" name="DS_USUARIO_SENHA" id="password" required><br>
                </div>
                <label>Cargo:</label>
                <div class="">
                    <input type="radio" name="DS_USUARIO_CARGO" id="adm" value="Administrador" required>
                    <label for="adm">Administrador</label>

                    <input type="radio" name="DS_USUARIO_CARGO" id="atd" value="Atendente" required>
                    <label for="atd">Atendente</label>
                </div>
            </fieldset>
            <fieldset>
                <legend>Endereço</legend>
                <div class="dados">
                    <label for="Numero">Numero:</label>
                    <input type="text" name="DS_NUMERO" id="Numero" required><br>
                </div>
                <div class="dados">
                    <label for="Rua">Rua:</label>
                    <input type="text" name="DS_RUA" id="Rua " required><br>
                </div>
                <div class="dados">
                    <label for="Bairro">Bairro:</label>
                    <input type="text" name="DS_BAIRRO" id="Bairro" required><br>
                </div>
                <div class="dados">
                    <label for="CEP">CEP:</label>
                    <input type="text" name="DS_CEP" id="CEP" required><br>
                </div>
                <div class="dados">
                    <label for="cidade">Cidade:</label><br />
                    <select name="CD_CIDADE" id="cidade" required>
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
</main>
<?php $this->start('js') ?>
    <script src="/javascript/paginas.js"></script>
<?php $this->stop() ?>
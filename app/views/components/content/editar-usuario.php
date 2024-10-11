<div class="card-grande">
    <h1>Atualizar Usuário</h1>
    <form action="/usuario/atualizar/<?=$_SESSION['id']?>" method="post">
        <div class="dados">
            <label for="nome">Nome:</label>
            <input type="text" name="NM_USUARIO" id="nome" required value="<?=$usuario->getNome()?>"><br>
        </div>
        <div class="dados">
            <label for="CPF">CPF:</label>
            <input type="text" name="DS_CPF_USUARIO" id="CPF" required value="<?=$usuario->getCPF()?>"><br>
        </div>
        <div class="dados">
            <label for="user">User:</label>
            <input type="text" name="DS_USUARIO_USER" id="user" required value="<?=$usuario->getUSER()?>"><br>
        </div>
        <div class="dados">
            <label for="password">Senha:</label>
            <input type="password" name="DS_USUARIO_SENHA" id="password" required><br>
        </div>
        <label>Cargo:</label>
        <div class="">
            <?php
                if($usuario->getCargo() == "Administrador"){
                    echo "<input type=\"radio\" name=\"DS_USUARIO_CARGO\" id=\"adm\" value=\"Administrador\" required checked>";
                } else {
                    echo "<input type=\"radio\" name=\"DS_USUARIO_CARGO\" id=\"adm\" value=\"Administrador\" required>";
                }
            ?>
            <label for="adm">Administrador</label>
                
            <?php
                if($usuario->getCargo() == "Atendente"){
                    echo "<input type=\"radio\" name=\"DS_USUARIO_CARGO\" id=\"adm\" value=\"Atendente\" required checked>";
                } else {
                    echo "<input type=\"radio\" name=\"DS_USUARIO_CARGO\" id=\"adm\" value=\"Atendente\" required>";
                }
            ?>
            <label for="atd">Atendente</label>
        </div>
        <div class="dados">
            <label for="Numero">Numero:</label>
            <input type="number" name="DS_NUMERO" id="Numero" required value="<?=$usuario->getNumeroCasa()?>"><br>
        </div>
        <div class="dados">
            <label for="Rua"  >Rua:</label>
            <input type="text" name="DS_RUA" id="Rua " required  value="<?=$usuario->getRua()?>"><br>
        </div>
        <div class="dados">
            <label for="Bairro">Bairro:</label>
            <input type="text" name="DS_BAIRRO" id="Bairro" required value="<?=$usuario->getBairro()?>" ><br>
        </div>
        <div class="dados">
            <label for="CEP">CEP:</label>
            <input type="text" name="DS_CEP" id="CEP" required value="<?=$usuario->getCEP()?>" ><br>
        </div>
        <div class="dados">
            <label for="cidade">Cidade:</label><br />
            <select name="CD_CIDADE" id="cidade" required>
                <?php
                foreach ($cidades as $cidade) {
                    if($cidade->getCodigo() == $usuario->getCidade()){
                        echo "<option value=\"{$cidade->getCodigo()}\" selected>{$cidade->getNome()}</option>";
                    }
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
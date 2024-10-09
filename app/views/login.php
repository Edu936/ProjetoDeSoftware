<!----------- Configuração da Pagina de Login ------------>
<?php $this->layout('master', ['title' => $title]) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/login.css">
<?php $this->stop() ?>

<!--------------- HTML da Pagina de Login ----------------->
<main>
    <div class="image">
        <h1>Entre<br />E gerencie sua loja!</h1>
        <img src="/images/Car finance-bro.png" />
    </div>
    <div class="form-main">
        <div class="card">
            <h1>Entrar</h1>
            <form action="/home" method="post" autocomplete="off">
                <div class="dados">
                    <label for="user">Usuário:</label><br />
                    <input type="text" name="DS_USUARIO_USER" id="user" placeholder="Usuário" required />
                </div>
                <div class="dados">
                    <label for="password">Senha:</label><br />
                    <input type="password" name="DS_USUARIO_SENHA" id="password" placeholder="Senha" required />
                </div>
                <div class="submit">
                    <input type="reset" value="Limpar" />
                    &nbsp;
                    <input type="submit" value="Confirmar" />
                </div>
            </form>
        </div>
        <a href="/sign-in">cadastrar-se</a>
    </div>
</main>
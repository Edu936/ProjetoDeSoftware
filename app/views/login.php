<?php $this->layout('master', ['title' => 'Estitica Automotiva']) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/login.css">
<?php $this->stop() ?>

<?php $this->start('js') ?>
<script src="/javascript/login.js"></script>
<?php $this->stop() ?>

<main>
    <div class="image">
        <h1>Entre<br />E gerencie sua loja!</h1>
        <img src="Car finance-bro.png" />
    </div>
    <div class="form-main">
        <div class="card">
            <h1>Entrar</h1>
            <form action="/home" method="post" autocomplete="off">
                <div class="dados">
                    <label for="user">Usuário:</label><br />
                    <input type="text" name="user" placeholder="Usuário" id="user" required />
                </div>
                <div class="dados">
                    <label for="password">Senha:</label><br />
                    <input type="password" name="password" placeholder="Senha" id="password" required />
                </div>
                <div class="submit">
                    <input type="reset" value="Limpar" />
                    &nbsp;
                    <input type="submit" value="Confirmar" />
                </div>
            </form>
        </div>
        <ul>
            <li>
                <a class="link" href="../Cadastra-se/sigin.html">
                    <p>Cadastrar-se</p>
                </a>
            </li>
        </ul>
    </div>
</main>
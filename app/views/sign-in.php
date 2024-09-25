<?php $this->layout('master', ['title' => 'Novo Usuario']) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/sign-in.css">
<?php $this->stop() ?>

<form action="usuario/salvar" method="post">
<label for="nome">Nome:</label>
<input type="text" name="NM_USUARIO" id="nome"><br>

</form>
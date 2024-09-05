<?php $this->layout('master', ['title' => 'Estitica Automotiva']) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/card.css">
<?php $this->stop() ?>

<div class="card">
    <h2>Cadastros de cidade</h2>
    <form action="/cidade/cadastrar" method="POST">
        <div class="data">
            <label for="name">Nome da cidade:</label><br>
            <input type="text" id="name" name="name" required><br>
        </div>
        <div class="data">
            <label for="estado">Estado:</label><br>
            <input type="text" id="estado" name="estado" required><br>
        </div>
        <div class="controll">
            <input type="reset" value="Limpar">
            <input type="submit" value="Confirmar">
        </div>
    </form>
</div>
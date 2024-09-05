<?php
    $this->layout('master', ['title' => 'Tela de Atendimento'])
?>

<?php $this->start('css') ?>
    <link rel="stylesheet" href="/style/atendimento.css">
<?php $this->stop() ?>

<?php $this->start('js') ?>
    <script src="/javascript/home.js"></script>
<?php $this->stop() ?>

<div>
    <button><a href="/cidade" target="atd">Cidade</a></button>
</div>

<div class="cadastros"><iframe src="" frameborder="0" name="atd"></iframe></div>
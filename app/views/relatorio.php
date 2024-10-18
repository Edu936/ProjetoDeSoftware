<?php $this->layout('master', ['title' => $title]) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="/style/relatorio.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<?php $this->start('js') ?>
    <script src="/javascript/paginas.js"></script>
<?php $this->stop() ?>

<div class="relatorio">
    <div class="relatorio-header">
        <button onclick="pagina('<?=$link?>')">Voltar</button>
    </div>
olá
</div>
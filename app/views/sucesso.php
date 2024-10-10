<?php $this->layout('master', ['title' => $title]) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/sign-in.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<main>
    <img src="<?=$imagem?>" alt="">
    <p><?=$messagem?></p><br>
    <button onclick="pagina('<?php echo $link?>')">Voltar ao inicio</button>
</main>

<?php $this->start('js') ?>
    <script src="/javascript/paginas.js"></script>
<?php $this->stop() ?>
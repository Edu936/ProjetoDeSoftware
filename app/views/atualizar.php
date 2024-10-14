<?php $this->layout('master', ['title'=> $title]) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/menu.css"/>
<link rel="stylesheet" href="/style/card.css"/>
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="/style/atualizar.css">
<link rel="stylesheet" href="/style/card-grande.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<?php $this->start('js') ?>
<script src="/javascript/paginas.js"></script>
<?php $this->stop() ?>

<div class="content">
    <nav class="update-header">
        <button class="exit" onclick="pagina('<?=$link?>')"><i class="bi bi-arrow-left"></i>  Voltar</button>
    </nav>
    <section class="update">
        <?php
            if($this->e($pag) == "cidade"){
                require_once('components/atualizar/cidade.php');
            }
            else if($this->e($pag) == "produto") {
                require_once('components/atualizar/produto.php');
            }
            else if($this->e($pag) == "cliente") {
                require_once('components/atualizar/cliente.php');
            }
            else if($this->e($pag) == "servico") {
                require_once('components/atualizar/servico.php');
            }
        ?>
    </section>
</div>
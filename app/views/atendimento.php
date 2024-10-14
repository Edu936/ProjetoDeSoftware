<?php $this->layout('master', ['title'=> $title]) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="/style/content-pedido.css"/> 
<link rel="stylesheet" href="/style/card-grande.css"/> 
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="/style/menu.css"/>
<link rel="stylesheet" href="/style/card.css"/>
<?php $this->stop() ?>

<?php $this->start('js') ?>
<script src="/javascript/paginas.js"></script>
<?php $this->stop() ?>

<div class="content">
    <div class="menu">
        <?=$this->insert('components/menu/atendimento-menu')?>  
    </div>
    <section>
        <?php 
            if($this->e($pag) == "index") {
                echo "<img src= \"images/Car wash-bro.png\"/>";
            } 
            else if($this->e($pag) == "pedido") {
                require_once('components/cadastros/form-pedido.php');
            } 
            else if($this->e($pag) == "orcamento") {
                require_once('components/cadastros/form-orcamento.php');
            }
            else if ($this->e($pag) == "finalizar") {
                require_once('components/content/finalizar.php');
            }
        ?>
    </section>
</div>
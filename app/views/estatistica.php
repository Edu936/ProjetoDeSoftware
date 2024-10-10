<?php $this->layout('master', ['title'=> $title]) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="/style/menu.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<div class="content">
    <div class="menu">
        <?=$this->insert('components/menu/estatistica-menu')?>  
    </div>
    <section>
        <?php 
            if($this->e($pag) == "index") {
                echo "<img src= \"images/Car wash-bro.png\"/>";
            } 
            else if($this->e($pag) == "produto") {
                require_once ('components/relatorio/relatorio-produto.php');
            }
            else if($this->e($pag) == "servico") {
                require_once ('components/relatorio/relatorio-servico.php');
            }
            else if($this->e($pag) == "atendente") {
                require_once ('components/relatorio/relatorio-atendente.php');
            }
            else if($this->e($pag) == "estoque") {
                require_once ('components/relatorio/relatorio-estoque.php');
            }
        ?>
    </section>
</div>
<?php $this->layout('master', ['title'=> 'Estética Automotiva']) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/menu.css"/>
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="/style/card.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<div class="content">

    <div class="menu">
        <?=require_once('components/menu/atendimento-menu.php')?>  
    </div>
    <section>
        <?php 
            if($this->e($pag) == "index") {
                echo "<img src= \"images/Car wash-bro.png\"/>";
            } 
            else if($this->e($pag) == "pedido") {
            } 
            else if($this->e($pag) == "orcamento") {
                require_once('components/cadastros/form-orcamento.php');
            } 
            else if($this->e($pag) == "cliente") {
                require_once('components/cadastros/form-cliente.php');
            } 
            else if($this->e($pag) == "veiculo") {
                require_once('components/cadastros/form-veiculo.php');
            } 
            else if ($this->e($pag) == "cadastro realizado") {
                echo $this->e($resposta);
                echo "<button>";
                echo "<a href=\"/cadastro\">voltar</a>";
                echo "</button>";
            }
        ?>
    </section>
</div>
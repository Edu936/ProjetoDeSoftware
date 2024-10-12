<!----------- Configuração da Pagina de Login ------------>
<?php $this->layout('master', ['title'=> $title]) ?>

<!------------------ Styele da Pagina -------------------->
<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/menu.css">
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="/style/card.css">
<link rel="stylesheet" href="/style/card-grande.css">
<link rel="stylesheet" href="/style/detalhe-usuario.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<!------------------ Script da Pagina --------------------->
<?php $this->start('js') ?>
<script src="/javascript/paginas.js"></script>
<?php $this->stop() ?>

<!--------------- HTML da Pagina de Login ----------------->
<div class="content">
    <div class="menu">
        <?=$this->insert('components/menu/configuracao-menu')?>  
    </div>
    <section>
        <?php 
            if($this->e($pag) == "index") {
                echo "<img src= \"images/Car wash-bro.png\"/>";
            } 
            else if($this->e($pag) == "detalhe") {
                require_once('components/detalhes/usuario.php');
            }
            else if($this->e($pag) == "edicao") {
                require_once('components/atualizar/usuario.php');
            }
            else if($this->e($pag) == "exclusao") {
                require_once('components/content/excluir-usuario.php');
            }
            else if($this->e($pag) == "telefone") {
                require_once('components/cadastros/form-usuario-telefone.php');
            }
            else if($this->e($pag) == "email") {
                require_once('components/cadastros/form-usuario-email.php');
            }
            else if ($this->e($pag) == "finalizar") {
                require_once('components/content/finalizar.php');
            }
        ?>
    </section>
</div>    
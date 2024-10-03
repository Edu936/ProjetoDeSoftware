<?php $this->layout('master', ['title' => 'Estética Automotiva' ,'name' => $usuario->getNome()]) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="/style/card.css">
<link rel="stylesheet" href="/style/menu.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<div class="content">
    <div class="menu">
        <?= require_once('components/menu/cadastro-menu.php') ?>
    </div>
    <section>
        
        <?php
        if ($this->e($pag) == "index") {
            echo "<img src= \"images/Car wash-bro.png\"/>";
        }
        else if ($this->e($pag) == "servico") {
            require_once('components/cadastros/form-servico.php');
        }
        else if ($this->e($pag) == "cidade") {
            require_once('components/cadastros/form-cidade.php');
        }
        else if ($this->e($pag) == "produto") {
            require_once('components/cadastros/form-produto.php');
        }
        else if($this->e($pag) == "fornecedor") {
            require_once('components/cadastros/form-fornecedor.php');
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
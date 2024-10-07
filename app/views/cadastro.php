<?php $this->layout('master', ['title' => 'Estética Automotiva']) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/card.css">
<link rel="stylesheet" href="/style/card-grande.css">
<link rel="stylesheet" href="/style/menu.css">
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<?php $this->start('js') ?>
<script src="/javascript/paginas.js"></script>
<?php $this->stop() ?>


<div class="content">
    <div class="menu">
        <?= $this->insert('components/menu/cadastro-menu') ?>
    </div>
    <section>
        <?php
        if ($this->e($pag) == "index") {
            echo "<img src= \"images/Car wash-bro.png\"/>";
        } else if ($this->e($pag) == "servico") {
            require_once('components/cadastros/form-servico.php');
        } else if ($this->e($pag) == "cidade") {
            require_once('components/cadastros/form-cidade.php');
        } else if ($this->e($pag) == "produto") {
            require_once('components/cadastros/form-produto.php');
        } else if ($this->e($pag) == "fornecedor") {
            require_once('components/cadastros/form-fornecedor.php');
        } else if ($this->e($pag) == "cliente") {
            require_once('components/cadastros/form-cliente.php');
        } else if ($this->e($pag) == "veiculo") {
            require_once('components/cadastros/form-veiculo.php');
        } else if ($this->e($pag) == "finalizar") {
            require_once('components/content/finalizar.php');
        }
        ?>
    </section>
</div>
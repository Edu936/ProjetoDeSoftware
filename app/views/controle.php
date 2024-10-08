<?php $this->layout('master', ['title' => 'Estética Automotiva']) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="/style/menu.css">
<link rel="stylesheet" href="/style/tables.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<?php $this->start('js') ?>
<script src="/javascript/paginas.js"></script>
<?php $this->stop() ?>

<div class="content">
    <div class="menu">
        <?= $this->insert('components/menu/controle-menu') ?>
    </div>
    <section>
        <?php
        if ($this->e($pag) == "index") {
            echo "<img src= \"images/Car wash-bro.png\"/>";
        }
        else if ($this->e($pag) == "produto") {
            echo "teste";
        } 
        else if ($this->e($pag) == "servico") {
            echo "teste";
        } 
        else if ($this->e($pag) == "orcamento") {
            require_once('components/tabelas/table-orcamento.php');
        } 
        else if ($this->e($pag) == "pedido") {
        } 
        else if ($this->e($pag) == "cidade") {
            require_once('components/tabelas/table-cidade.php');
        } 
        else if ($this->e($pag) == "cliente") {
            echo "teste";
        } 
        else if ($this->e($pag) == "veiculo") {
            echo "teste";
        } 
        else if ($this->e($pag) == "fornecedor") {
            require_once('components/tabelas/table-fornecedor.php');
        }
        ?>
    </section>
</div>
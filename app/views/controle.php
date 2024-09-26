<?php $this->layout('master', ['title' => 'Estética Automotiva']) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="/style/menu.css">
<link rel="stylesheet" href="/style/tables.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<div class="conteiner">
    <div class="menu">
        <?= $this->insert('layout/menu/controle-menu') ?>
    </div>
    <section>
        <?php
        if ($this->e($pag) == "index") {
            echo "<img src= \"images/Car wash-bro.png\"/>";
        } 
        else if ($this->e($pag) == "pagamento") {
            echo "teste";
        } 
        else if ($this->e($pag) == "produto") {
            echo "teste";
        } 
        else if ($this->e($pag) == "servico") {
            echo "teste";
        } 
        else if ($this->e($pag) == "orcamento") {
            echo "teste";
        } 
        else if ($this->e($pag) == "pedido") {
            echo "teste";
        } 
        else if ($this->e($pag) == "cidade") {
            require_once('layout/tables/cidades.php');
        } 
        else if ($this->e($pag) == "cliente") {
            echo "teste";
        } 
        else if ($this->e($pag) == "veiculo") {
            echo "teste";
        } 
        else if ($this->e($pag) == "fornecedor") {
            echo "teste";
        }
        ?>
    </section>
</div>
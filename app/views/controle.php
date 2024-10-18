<?php $this->layout('master', ['title' => $title]) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/card.css">
<link rel="stylesheet" href="/style/menu.css">
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="/style/tables.css">
<link rel="stylesheet" href="/style/detalhes.css">
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
            require_once('components/tabelas/table-produto.php');
        } 
        else if ($this->e($pag) == "servico") {
            require_once('components/tabelas/table-servico.php');
        } 
        else if ($this->e($pag) == "orcamento") {
            require_once('components/tabelas/table-orcamento.php');
        } 
        else if ($this->e($pag) == "pedido") {
            require_once('components/tabelas/table-pedido.php');
        } 
        else if ($this->e($pag) == "cidade") {
            require_once('components/tabelas/table-cidade.php');
        } 
        else if ($this->e($pag) == "cliente") {
            require_once('components/tabelas/table-cliente.php');
        } 
        else if ($this->e($pag) == "veiculo") {
            require_once('components/tabelas/table-veiculo.php');
        } 
        else if ($this->e($pag) == "fornecedor") {
            require_once('components/tabelas/table-fornecedor.php');
        }
        // Detalhes
        else if($this->e($pag) == "detalhe produto"){
            require_once('components/detalhes/produto.php');
        } 
        else if($this->e($pag) == "detalhe orcamento"){
            require_once('components/detalhes/orcamento.php');
        } 
        else if($this->e($pag) == "detalhe cliente"){
            require_once('components/detalhes/cliente.php');
        } 
        else if($this->e($pag) == "detalhe fornecedor"){
            require_once('components/detalhes/fornecedor.php');
        } 
        else if($this->e($pag) == "detalhe pedido"){
            require_once('components/detalhes/pedido.php');
        } 
        else if($this->e($pag) == "detalhe veiculo"){
            require_once('components/detalhes/veiculo.php');
        } 
        else if($this->e($pag) == "detalhe parcelas"){
            require_once('components/tabelas/table-parcela.php');
        } 
        // Finalizar
        else if ($this->e($pag) == "finalizar") {
            require_once('components/content/finalizar.php');
        }
        ?>
    </section>
</div>
<?php $this->layout('master', ['title'=> $title]) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/menu.css"/>
<link rel="stylesheet" href="/style/card.css"/>
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="/style/card-grande.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                if($this->e($etapa) == "primeira"){
                    require_once('components/pedido/primeiraEtapa.php');
                } 
                else if($this->e($etapa) == "segunda"){
                    require_once('components/pedido/segundaEtapa.php');
                }
                else if($this->e($etapa) == "terceira") {
                    require_once('components/pedido/terceiraEtapa.php');
                }
                else if($this->e($etapa) == "quarta") {
                    require_once('components/pedido/quartaEtapa.php');
                }
                else if($this->e($etapa) == "quinta") {
                    require_once('components/pedido/quintaEtapa.php');
                }
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

<?php $this->start('js') ?>
<script src="/javascript/paginas.js"></script>
<script src="/javascript/select.js"></script>
<?php $this->stop() ?>

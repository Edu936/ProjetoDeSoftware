<?php $this->layout('master', ['title'=> 'EsticaAutomotiva', 'pag']) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/menu.css"/>
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="/style/atendimento.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<div class="conteiner">
    <div class="menu">
        <?=$this->insert('layout/atendimento-menu')?>  
    </div>
    <section>
        <?php 
            if($this->e($pag) == "index") {
                echo "<img src= \"images/Car wash-bro.png\"/>";
            } else if($this->e($pag) == "client") {
                echo $this->insert('components/form-client');
            }
        ?>
    </section>
</div>
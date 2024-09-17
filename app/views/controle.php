<?php $this->layout('master', ['title'=> 'EsticaAutomotiva']) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="/style/menu.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<div class="conteiner">
    <div class="menu">
        <?=$this->insert('layout/menu/controle-menu')?>  
    </div>
    <section>
        
    </section>
</div>
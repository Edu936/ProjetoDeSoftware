<?php $this->layout('master',['title'=> 'EsticaAutomotiva']) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="/style/atendimento.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<div class="atendimento-contant">
    <div class="atendimentos">
        <ul>
            <li class="optionsAtend">
                Novo Pedido
            </li>
            <li class="optionsAtend">
                Novo Orçamento
            </li>
        </ul>
    </div>
    <div class="imges">
        <img src="/images/Car wash-bro.png" alt="">
    </div>
</div>
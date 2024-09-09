<?php $this->layout('master',['title'=> 'EsticaAutomotiva']) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/home.css">
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
    <div>
        <iframe src="" frameborder="0" name="atend"></iframe>
    </div>
</div>
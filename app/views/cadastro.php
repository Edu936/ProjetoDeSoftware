<?php $this->layout('master', ['title' => 'Estética Automotiva']) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="/style/card.css">
<link rel="stylesheet" href="/style/menu.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<div class="conteiner">
    <div class="menu">
        <?= $this->insert('layout/menu/cadastro-menu') ?>
    </div>
    <section>
        <?php
        if ($this->e($pag) == "index") {
            echo "<img src= \"images/Car wash-bro.png\"/>";
        }
        ?>

        <?php
        if ($this->e($pag) == "servico") {
            echo $this->insert('components/cadastro-form/form-servico');
        }
        ?>

        <?php
        if ($this->e($pag) == "cidade") {
            echo $this->insert('components/cadastro-form/form-cidade');
        }
        ?>

        <?php
        if ($this->e($pag) == "produto") {
            echo $this->insert('components/cadastro-form/form-produto');
        }
        ?>

        <?php
        if ($this->e($pag) == "fornecedor") {
            echo $this->insert('components/cadastro-form/form-fornecedor');
        }
        ?>

        <?php
        if ($this->e($pag) == "cadastro realizado") {
            echo $this->e($resposta);
            echo "<button>";
            echo "<a href=\"/cadastro\">voltar</a>";
            echo "</button>";
        }
        ?>

    </section>
</div>
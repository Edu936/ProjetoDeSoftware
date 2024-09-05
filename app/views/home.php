<?php $this->layout('master', ['title' => 'Estitica Automotiva']) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/home.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<?php $this->start('js') ?>
<script src="/javascript/home.js"></script>
<?php $this->stop() ?>

<!-- <?= $this->insert('layouts/header') ?> -->

<header>
    <div class="sidebar-active">
        <span class="active-sidebar" onclick="esconderMenu()">
            <i class="bi bi-three-dots"></i>
        </span>
    </div>
    <div class="search">
        <input type="search" name="search" id="search">
    </div>
    <div class="unit">
        <div class="description-unit">
            <h4>ClubCar LTA</h4>
        </div>
        <span>
            <img class="logo-unit" src="https://sujeitoprogramador.com/steve.png" alt="Foto da unidade">
        </span>
    </div>
</header>
<aside id="menu">
    <div class="head-sidebar">
        <h4>Menu</h4>
    </div>
    <nav class="body-sidebar">
        <ul>
            <li class="options">
                <a href="/atendimento" target="main">
                    <i class="bi bi-clipboard"></i>
                    <span>Atendimento</span>
                </a>
            </li>
            <li class="options">
                <a href="../components/controle/controle.html" target="main">
                    <i class="bi bi-controller"></i>
                    <span>Controle</span>
                </a>
            </li>
            <li class="options">
                <a href="../components/cadastros/cadastro.html" target="main">
                    <i class="bi bi-pen"></i>
                    <span>Cadastros</span>
                </a>
            </li>
            <li class="options">
                <a href="../components/estatistica/estatistica.html" target="main">
                    <i class="bi bi-graph-up"></i>
                    <span>Estatisticas</span>
                </a>
            </li>
            <li class="options" >
                <i class="bi bi-gear-fill"></i>
                <span>Configuração</span>
            </li>
        </ul>
    </nav>
    <div class="footer-sidebar">
        <a href="../../login/login.html">
            <span class="icon">
                <i class="bi bi-box-arrow-left"></i>
            </span>
        </a>
    </div>
</aside>
<main>
    <iframe src="" frameborder="0" name="main"></iframe>
</main>
<footer></footer>
<?php $this->layout('master', ['title' => 'Estitica Automotiva']) ?>

<?php $this->start('css') ?>
    <link rel="stylesheet" href="/style/home.css">
<?php $this->stop() ?>

<?php $this->start('js') ?>
    <script src="/javascript/home.js"></script>
<?php $this->stop() ?>

<h1>User</h1>
<p id="name">Hello, <?=$this->e($name) ?></p>


<?php $this->layout('master', ['title' => 'home', 'name' => 'Eduardo']) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/home.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<?php $this->start('js') ?>
<script src="/javascript/home.js"></script>
<?php $this->stop() ?>

<?=$this->insert('layouts/header') ?>
<?=$this->insert('layouts/asside')?>
<main>
    <?=$this->section('content');?>
</main>
<?=$this->insert('layouts/footer')?>

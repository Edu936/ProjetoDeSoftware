<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!------- Define o titulo da pagina -------->
    <title><?= $this->e($title) ?></title>
    <!------------------------------------------>

    <!-- Define o estilo e o script da pagina -->
    <?php echo $this->section('css') ?>
    <?php echo $this->section('js') ?>
    <!------------------------------------------>

</head>

<body>
    <?php
        if ($this->e($title) == "Login" || $this->e($title) == "Sing-In" || $this->e($title) == "Cadastro Usuario") {
            echo $this->section('content');
        } 
        else if($_SESSION['user'] != "" && $this->e($title) == "Relatorio Pedido") {
            echo $this->section('content');
        }
        else if($_SESSION['user'] != "") {
            require_once('layout/header.php');
            require_once('layout/asside.php');
            echo "<main>{$this->section('content')}</main>";
            require_once('layout/footer.php');
        }
    ?>
</body>

</html>
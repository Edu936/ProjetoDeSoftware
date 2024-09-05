<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!------- Define o titulo da pagina -------->
        <title>Estetica Automotiva</title>
        <!------------------------------------------>

        <!-- Define o estilo e o script da pagina -->
        <?php echo $this->section('css') ?>
        <?php echo $this->section('js') ?>
        <!------------------------------------------>

    </head>
    <body>

        <div class="container">
            <?= $this->section('content') ?>
        </div>

    </body>
</html>
<?php $this->layout('master', ['title' => 'Estética Automotiva']) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="/style/menu.css">
<link rel="stylesheet" href="/style/controle.css">
<link rel="stylesheet" href="/style/tables.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<div class="conteiner">
    <div class="menu">
        <?= $this->insert('layout/menu/controle-menu') ?>
    </div>
    <section>
        <?php
        if ($this->e($pag) == "index") {
            echo "<img src= \"images/Car wash-bro.png\"/>";
        }
        ?>
        <?php
        if ($this->e($pag) == "cidade") {
            require_once('layout/tables/cidades.php');
            // echo 
            // "<table>
            //     <thead>
            //         <tr>
            //             <th>Codigo</th>
            //             <th>Cidade</th>
            //             <th>Estado</th>
            //         </tr>
            //     </thead>
            //     <tbody>"
            // ;
            // foreach ($cidades as $cidade) {
            //     echo
            //     "<tr>
            //         <th>{$cidade->getCodigo()}</th>
            //         <th>{$cidade->getNome()}</th>
            //         <th>{$cidade->getEstado()}</th>
            //     </tr>";               
            // }
            // echo"</tbody>
            // </table>";
        }
        ?>
    </section>
</div>
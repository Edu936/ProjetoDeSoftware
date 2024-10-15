<div class="content-pedido">
    <div class="action-pedido">
        <button class="option-pedido" onclick="pagina('<?=$link?>')">Voltar</button>
        &nbsp;
        &nbsp;
        <div class="search">
            <select id="cliente-pedido">
                <?php
                    echo "<option value=\"null\" selected>Selecione o Cliente</option>";
                    foreach ($clientes as $cliente) {
                        echo "<option class=\"option\"  value=\"{$cliente->getCodigo()}\">{$cliente->getNome()}</option>";
                    }
                ?>
            </select>
            &nbsp;
            &nbsp;
            <button onclick="buscarClientePedido()">Buscar Dados</button>
        </div>
    </div>
    <div class="form-pedido">
        <?php
            if($etapa == "primeira") {
                echo "<img src=\"/images/Car wash-rafiki.png\">";
            } 
            else if($etapa == "segunda") {
                require_once('pedidos-Etapas/segunda.php');
            }
            else if($etapa == "terçeira") {
                require_once('pedidos-Etapas/terceira.php');
            }
            else if($etapa == "quinta") {
                require_once('pedidos-Etapas/quinta.php');
            }
            else if($etapa == "sexta") {
                require_once('pedidos-Etapas/sexta.php');
            }
        ?>
    </div>
</div>
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
                // echo "<div class=\"action-pedido\">";
                // echo "<button class=\"option-pedido\">Buscar orçamento do cliente</button>";
                // echo "&nbsp;";
                // echo "&nbsp;";
                // echo "<button class=\"option-pedido\">Criar um pedido novo</button>";
                // echo "&nbsp;";
                // echo "&nbsp;";
                // echo "<p class=\"detalhe\">Nome: {$cliente->getNome()} &nbsp; CPF: {}</p>";
                // echo "</div>";
                // echo "<div class=\"form-pedido\">";
                // echo "<img src=\"/images/Car wash-rafiki.png\">";
                // echo "</div>";
            }
            else if($etapa == "terçeira") {

            }
        ?>
    </div>
</div>
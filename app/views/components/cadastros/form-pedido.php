<div class="card-grande">
    <h1>Novo Pedido</h1>
    <form action="/pedido/salvar" method="post">
        <fieldset>
            <legend>Cliente</legend>
            <div class="dados">
                <label for="cliente">Escolha um Cliente</label>
                <select name="CD_CLIENTE" id="cliente" required>
                    <option value="" selected>    </option>
                    <?php
                        foreach($clientes as $cliente){
                            echo "<option value=\"{$cliente->getCodigo()}\">{$cliente->getNome()}</option>";
                        }
                    ?>
                </select>
            </div>
        </fieldset>
        <div class="submit">
            <input type="reset" value="Limpar">
            &nbsp;
            &nbsp;  
            <input type="submit" value="Confirmar">
        </div>
    </form>
</div>
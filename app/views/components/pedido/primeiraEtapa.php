<h1>Novo Pedido</h1>
<div class="card">
    <h1>Primeira Etapa</h1>
    <form action="/pedido/cliente" method="post">

        <div class="dados">
            <label for="cliente">Escolha um Cliente</label>
            <select name="CD_CLIENTE" id="cliente" required>
                <option value="" selected> </option>
                <?php
                foreach ($clientes as $cliente) {
                    echo "<option value=\"{$cliente->getCodigo()}\">{$cliente->getNome()}</option>";
                }
                ?>
            </select>
        </div>
        <div class="submit">
            <input type="reset" value="Limpar">
            &nbsp;
            &nbsp;
            <input type="submit" value="Próxima etapa">
        </div>
    </form>
</div>
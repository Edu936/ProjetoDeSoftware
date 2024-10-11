<h1>Novo Pedido</h1>
<div class="card">
    <h1>Primeira Etapa</h1>
    <form action="/pedido/veiculo" method="post">
        <div class="dados">
            <label for="cliente">Cliente</label>
            <input type="text" value="<?=$cliente->getNome()?>" >
        </div>
        <div class="dados">
            <label for="veiculo">Escolha um Veiculo</label>
            <select name="CD_VEICULO" id="veiculo">
                <option value="" selected> </option>
                <?php
                foreach ($veiculos as $veiculo) {
                    echo "<option value=\"{$veiculo->getCodigo()}\">{$veiculo->getModelo()}</option>";
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
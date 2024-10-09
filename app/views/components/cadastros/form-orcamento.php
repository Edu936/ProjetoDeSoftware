<div class="card-grande">
    <form action="" method="post">
        <div class="dados">
            <select name="CD_CLIENTE" id="">
                <?php
                foreach($clientes as $cliente){
                    echo "<option value=\"{$cliente->getCodigo()}\">{$cliente->getNome()}</option>";

                }
                ?>
            </select>
        </div>
        <div class="submit">
                    <input type="reset" value="Limpar" />
                    &nbsp;
                    <input type="submit" value="Cadastrar" />
            </div>
        </div>
    </form>
</div>
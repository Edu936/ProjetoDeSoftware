<div class="search">
    <select name="CD_CIDADE" id="cliente">
        <?php
        echo "<option selected>Selecione o Cliente</option>";
        foreach ($clientes as $cliente) {
            echo "<option class=\"option\"  value=\"{$cliente->getCodigo()}\">{$cliente->getNome()}</option>";
        }
        ?>
    </select>
    &nbsp;
    &nbsp;
    <button onclick="buscarCliente()">Buscar Dados</button>
</div>
<div class="form-veiculo">
    <?php
    if ($pronto) {
        echo "
        <div class=\"dado\">
            <p>Cliente: {$client->getNome()}</p>
            <p>CPF: {$client->getCPF()}</p>
        </div>

        <div class=\"card\">
            <h1>Cadastro de Veiculos</h1>
            <form action=\"/veiculo/salvar/{$client->getCodigo()}\" method=\"post\" autocomplete=\"off\">
                <div class=\"dados\">
                    <label for=\"placa\">Placa do Veiculo:</label><br />
                    <input type=\"text\" name=\"DS_PLACA\" id=\"placa\" placeholder=\"Digite a placa\" required />
                </div>
                <div class=\"dados\">
                    <label for=\"modelo\">Modelo do Veiculo:</label><br />
                    <input type=\"text\" name=\"DS_MODELO\" id=\"modelo\" placeholder=\"Digite o Modelo do Veiculo\" required />
                </div>
                <div class=\"dados\">
                    <label for=\"marca\">Marca do Veiculo:</label><br />
                    <input type=\"text\" name=\"DS_MARCA\" id=\"marca\" placeholder=\"Digite a Marca do Veiculo\" required />
                </div>
                <div class=\"dados\">
                    <label for=\"marca\">Porte do Veiculo:</label><br />
                    <select name=\"DS_PORTE\" id=\"porte\">
                    <option value=\"moto\">Moto</option>
                    <option value=\"hach-compacto\">hach-Compacto</option>
                    <option value=\"sedan-compacto\">Sedan-Compacto</option>
                    <option value=\"suv-compacto\">Suv-Compacto</option>
                    <option value=\"hach-medio\">hach-Medio</option>
                    <option value=\"sedan-medio\">Sedan-Medio</option>
                    <option value=\"suv-medio\">Suv-Medio</option>
                    <option value=\"picape\">Picape</option>
                    </select>
                </div>
                <div class=\"submit\">
                    <input type=\"reset\" value=\"Limpar\" />
                    &nbsp;
                    <input type=\"submit\" value=\"Cadastrar\" />
                </div>
            </form>
        </div>";
    } else {
    }
    ?>
</div>
<div class="card-grande">
    <h1>Cadastro de Pedidos</h1>
    <form action="/pedido/salvar/<?=$clienteSelecionado->getCodigo()?>" method="post">
        <fieldset>
            <legend>Clientes</legend>
            <div class="dados">
                <label for="cliente">Selecione o Cliente: </label>
                <input type="text" id="cliente" value="<?=$clienteSelecionado->getNome()?>">
                <label for="orcamento">Orçamento Selecionado:</label>
                <input type="text" id="orcamento" name="CD_ORCAMENTO" value="Não possui orçamento">
                <label for="veiculo">Selecione o Veiculo:</label>
                <select name="CD_VEICULO" id="veiculo">
                    <option value="" selected>Selecione o veiculo</option>
                    <?php
                        foreach($veiculos as $veiculo) {
                            echo "<option value=\"{$veiculo->getCodigo()}\">{$veiculo->getModelo()} - {$veiculo->getPalca()}</option>";
                        }
                    ?>
                </select>
            </div>
        </fieldset>
        <fieldset>
            <legend>Produtos Selecionados</legend>
            <div id="options-prod">
                <div class="dadosP">
                    <label for="produto">Selecione o Produto: </label>
                    <select name="CD_PRODUTO[]" id="produto">
                        <option value="" selected></option>
                        <?php
                            foreach($produtos as $produto) {
                                echo "<option value=\"{$produto->getCodigo()}\">{$produto->getNome()}</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Serviços</legend>
            <div id="options-serv">
                <div class="dadosS">
                    <label for="servico">Selecione o Serviços: </label>
                    <select name="CD_SERVICO[]" id="servico">
                        <option value="" selected></option>
                        <?php
                            foreach($servicos as $servico) {
                                echo "<option value=\"{$servico->getCodigo()}\">{$servico->getNome()}</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
        </fieldset>
        <div class="submit">
            <button type="button" onclick="addServico()">Adcionar Serviço</button>
            &nbsp;
            &nbsp;
            <button type="button" onclick="removeServico()">Remover Serviço</button>
            &nbsp;
            &nbsp;
            <button type="button" onclick="addProduto()">Adcionar Produto</button>
            &nbsp;
            &nbsp;
            <button type="button" onclick="removeProduto()">Remover Produto</button>
            &nbsp;
            &nbsp;
            <button type="reset">Linpar Campos</button>
            &nbsp;
            &nbsp;
            <button type="submit">confirmar</button>
        </div>
    </form>
</div>
<script>
    function addProduto(){
        const gridProd = document.querySelector('#options-prod');
        const produtos = document.querySelector('.dadosP');
        let clone = produtos.cloneNode(true);
        gridProd.appendChild(clone);
    }

    function removeProduto(){
        const produtos = document.querySelectorAll('.dadosP');
        if(produtos.length >1){
            produtos[produtos.length -1].remove();
        }
    }

    function addServico(){
        const gridServi = document.querySelector('#options-serv');
        const servicos = document.querySelector('.dadosS');
        let clone = servicos.cloneNode(true);
        gridServi.appendChild(clone);
    }

    function removeServico(){
        const servicos = document.querySelectorAll('.dadosS');
        if(servicos.length >1){
            servicos[servicos.length -1].remove();
        }
    }
</script>
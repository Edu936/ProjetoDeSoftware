<div class="card-grande">
    <h1>Associar Serviço</h1>
    <form action="/produto/serviço/salvar/<?=$produto->getCodigo()?>" method="post">
        <fieldset>
            <legend>Servços</legend>
            <div id="options-ford">
                <div class="dadosP">
                    <label for="fornecedor">Selecione o Serviço: </label>
                    <select name="CD_SERVICO[]" id="fornecedor">
                        <option value="" selected>Escolha um Serviço</option>
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
            <button type="button" onclick="pagina('<?=$link?>')">Voltar</button>
            &nbsp;
            &nbsp;
            <button type="button" onclick="addServico()">Adcionar Serviço</button>
            &nbsp;
            &nbsp;
            <button type="button" onclick="removeServico()">Remover Serviço</button>
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
    function addFornecedor(){
        const grid = document.querySelector('#options-ford');
        const fornecedores = document.querySelector('.dadosP');
        let clone = fornecedores.cloneNode(true);
        grid.appendChild(clone);
    }

    function removeFornecedor(){
        const fornecedor = document.querySelectorAll('.dadosP');
        if(fornecedor.length >1){
            fornecedor[fornecedor.length -1].remove();
        }
    }
</script>
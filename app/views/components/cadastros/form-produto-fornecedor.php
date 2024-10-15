<div class="card-grande">
    <h1>Associar Fornecedor</h1>
    <form action="/produto/fornecedor/salvar/<?=$produto->getCodigo()?>" method="post">
        <fieldset>
            <legend>Fornecedores</legend>
            <div id="options-ford">
                <div class="dadosP">
                    <label for="fornecedor">Selecione o Fornecedor: </label>
                    <select name="CD_FORNECEDOR[]" id="fornecedor">
                        <option value="" selected>Escolha um Fornecedor</option>
                        <?php
                            foreach($fornecedores as $fornecedor) {
                                echo "<option value=\"{$fornecedor->getCodigo()}\">{$fornecedor->getNome()}</option>";
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
            <button type="button" onclick="addFornecedor()">Adcionar Fornecedor</button>
            &nbsp;
            &nbsp;
            <button type="button" onclick="removeFornecedor()">Remover Fornecedor</button>
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
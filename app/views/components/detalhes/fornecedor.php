<h2 class="card-details-title">
    Detalhes do Fornecedor
</h2>
<div class="card-details">
    <div class="card-content">
        <fieldset>
            <legend>Dados do Fornecedor</legend>
            <p>Nome: <?=$fornecedor->getNome()?></p>
            <p>Codigo: <?=$fornecedor->getCodigo()?></p>
            <p>CNPJ: <?=$fornecedor->getCNPJ()?></p>
        </fieldset>
        <fieldset>
            <legend>Produtos acossiados</legend>
            <?php
            if($produtos) {
                foreach ($produtos as $produto) {
                    echo "<p>Nome: {$produto->getNome()}</p><br/>";
                }
            } else {
                echo "<p>Não a produtos associados a esse fornecedor.</p>";
            }
            ?>
        </fieldset>
    </div>
    <div class="card-details-option">
        <button onclick="pagina('<?=$link?>')">Voltar</button>
    </div>
</div>
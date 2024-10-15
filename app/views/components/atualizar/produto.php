<div class="card">
    <h1>Atualizar Produtos</h1>
    <form action="/produto/atualizar/<?=$produto->getCodigo()?>" method="post" autocomplete="off">
        <div class="dados">
            <label for="name">Nome do Produto:</label><br />
            <input type="text" name="NM_PRODUTO" id="name" value="<?=$produto->getNome()?>" required />
        </div>
        <div class="dados">
            <label for="valor">Valor do Produto:</label><br />
            <input type="number" name="VL_PRODUTO" id="valor" value="<?=$produto->getValor()?>" required />
        </div>
        <div class="submit">
            <input type="reset" value="Limpar" />
            &nbsp;
            <input type="submit" value="Cadastrar" />
        </div>
    </form>
</div>
<div class="card">
    <h1>Debitar Produtos</h1>
    <form action="/produto/debitar/<?=$produto->getCodigo()?>" method="post" autocomplete="off">
        <div class="dados">
            <label for="quantidade">Quantidade:</label><br />
            <input type="number" name="QTD_PRODUTO" id="quantidade" placeholder="Quantidade" required/>
        </div>
        <div class="submit">
            <input type="reset" value="Limpar" />
            &nbsp;
            <input type="submit" value="Cadastrar" />
        </div>
    </form>
</div>
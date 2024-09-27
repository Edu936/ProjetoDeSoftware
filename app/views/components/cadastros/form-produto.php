<div class="card">
    <h1>Cadastro de Produtos</h1>
    <form action="/produto/salvar" method="post" autocomplete="off">
        <div class="dados">
            <label for="name">Nome do Produto:</label><br />
            <input type="text" name="name" id="name" placeholder="Usuário" required />
        </div>
        <div class="dados">
            <label for="valor">Valor do Produto:</label><br />
            <input type="number" name="valor" id="valor" placeholder="Valor" required />
        </div>
        <div class="dados">
            <label for="quantidade">Quantidade Inicial:</label><br />
            <input type="number" name="quantidade" id="quantidade" placeholder="Quantidade"/>
        </div>
        <div class="submit">
            <input type="reset" value="Limpar" />
            &nbsp;
            <input type="submit" value="Cadastrar" />
        </div>
    </form>
</div>
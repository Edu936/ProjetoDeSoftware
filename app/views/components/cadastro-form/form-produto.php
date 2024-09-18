<form action="/produto/salvar" method="post">
    <h4>Cadastro de Produtos</h4>
    <div class="card">
        <div class="data">
            <div>
                <label for="name">Nome:</label>&nbsp;
                <input type="text" name="name" id="nome" requireed>
            </div>
            <div>   
                <label for="valor">Valor:</label>&nbsp;
                <input type="text" name="valor" id="valor" requireed>
            </div>
            <div>   
                <label for="quantidade">Quantidade:</label>&nbsp;
                <input type="text" name="quantidade" id="quantidade" requireed>
            </div>
        </div>
        <div class="control">
            <button type="reset">Limpar</button>
            &nbsp;
            &nbsp;
            <button type="submit">Cadastrar</button>
        </div>
    </div>
</form>
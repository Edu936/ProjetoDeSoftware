<form action="/cidade/salvar" method="post">
    <h4>Cadastro de Cidade</h4>
    <div class="card">
        <div class="data">
            <div>
                <label for="name">Cidade:</label>&nbsp;
                <input type="text" name="name" id="name" requireed>
            </div>
            <div>   
                <label for="estado">Estado:</label>&nbsp;
                <input type="text" name="estado" id="estado" requireed>
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
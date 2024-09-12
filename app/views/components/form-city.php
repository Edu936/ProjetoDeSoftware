<div class="card">
    <h4>Cadastro de Cidade</h4>
    <form action="/cidade/salvar" method="post">
        <div class="data">
            <label for="name">Digite o nome da cidade:</label>
            <input type="text" name="name" id="name" requireed>
        </div>
        <div class="data">
            <label for="estado">Digite o nome do Estado:</label>
            <input type="text" name="estado" id="estado" requireed>
        </div>
        <div class="control">
            <button type="reset">Limpar</button>
            &nbsp;
            <button type="submit">Cadastrar</button>
        </div>        
    </form>
</div>
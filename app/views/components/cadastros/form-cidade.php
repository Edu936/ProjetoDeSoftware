<div class="card">
    <h1>Cadastro de Cidades</h1>
    <form action="/cidade/salvar" method="post" autocomplete="off">
        <div class="dados">
            <label for="name">Nome da Cidade:</label><br />
            <input type="text" name="name" id="name" placeholder="Cidade" required />
        </div>
        <div class="dados">
            <label for="estado">Nome do Estado:</label><br />
            <input type="text" name="estado" id="estado" placeholder="Estado" required />
        </div>
        <div class="submit">
            <input type="reset" value="Limpar" />
            &nbsp;
            <input type="submit" value="Cadastrar" />
        </div>
    </form>
</div>
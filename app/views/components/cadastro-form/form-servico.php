<div class="card">
    <h1>Cadastro de Serviços</h1>
    <form action="/servico/salvar" method="post" autocomplete="off">
        <div class="dados">
            <label for="name">Nome da Serviço:</label><br />
            <input type="text" name="name" id="name" placeholder="Serviço" required />
        </div>
        <div class="dados">
            <label for="valor">Valor do Serviço:</label><br />
            <input type="number" name="valor" id="valor" placeholder="Preço" required />
        </div>
        <div class="submit">
            <input type="reset" value="Limpar" />
            &nbsp;
            <input type="submit" value="Cadastrar" />
        </div>
    </form>
</div>
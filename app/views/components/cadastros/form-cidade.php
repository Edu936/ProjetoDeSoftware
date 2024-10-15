<div class="card">
    <h1>Cadastro de Cidade</h1>
    <form action="/cidade/salvar" method="post" autocomplete="off">
        <div class="dados">
            <label for="name">Nome da Cidade:</label><br>
            <input type="text" name="NM_CIDADE" id="name" placeholder="Digite o nome completo da cidade" required>
        </div>
        <div class="dados">
            <label for="estado">Nome do Estado:</label><br>
            <input type="text" name="DS_ESTADO_CIDADE" id="estado" placeholder="Digite o nome completo do estado" required>
        </div>
        <div class="submit">
            <button type="reset">Limpar</button>
            &nbsp;
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</div>
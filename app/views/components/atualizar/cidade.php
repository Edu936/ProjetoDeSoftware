<div class="card">
    <h1>Atualização de Cidade</h1>
    <form action="/cidade/atualizar/<?=$cidade->getCodigo()?>" method="post" autocomplete="off">
        <div class="dados">
            <label for="name">Nome da Cidade:</label><br>
            <input type="text" name="NM_CIDADE" id="name" value="<?=$cidade->getNome()?>" required>
        </div>
        <div class="dados">
            <label for="estado">Nome do Estado:</label><br>
            <input type="text" name="DS_ESTADO_CIDADE" id="estado" value="<?=$cidade->getEstado()?>" required>
        </div>
        <div class="submit">
            <button type="reset">Limpar</button>
            &nbsp;
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</div>
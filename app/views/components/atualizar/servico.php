<div class="card">
    <h1>Atualização de Serviços</h1>
    <form action="/servico/atualizar/<?=$servico->getCodigo()?>" method="post" autocomplete="off">
        <div class="dados">
            <label for="name">Nome da Serviço:</label><br />
            <input type="text" name="NM_SERVICO" id="name" value="<?=$servico->getNome()?>" required />
        </div>
        <div class="dados">
            <label for="valor">Valor do Serviço:</label><br />
            <input type="number" name="VL_SERVICO" id="valor" value="<?=$servico->getValor()?>" required />
        </div>
        <div class="submit">
            <input type="reset" value="Limpar" />
            &nbsp;
            <input type="submit" value="Cadastrar" />
        </div>
    </form>
</div>
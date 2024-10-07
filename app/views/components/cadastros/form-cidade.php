<div class="card">
    <h1><?=$card?></h1>
    <form action="<?=$route?>" method="post" autocomplete="off">
        <div class="dados">
            <label for="name">Nome da Cidade:</label><br />
            <?php echo "<input type=\"text\" name=\"NM_CIDADE\" id=\"name\" placeholder=\"Cidade\" required  value=\"{$cidade->getNome()}\"/>" ?>
        </div>
        <div class="dados">
            <label for="estado">Nome do Estado:</label><br />
            <?php echo "<input type=\"text\" name=\"DS_ESTADO_CIDADE\" id=\"name\" placeholder=\"Cidade\" required value=\"{$cidade->getEstado()}\"/>" ?>
        </div>
        <div class="submit">
            <input type="reset" value="Limpar" />
            &nbsp;
            <input type="submit" value="Cadastrar" />
        </div>
    </form>
</div>
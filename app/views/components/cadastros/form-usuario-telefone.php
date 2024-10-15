<div class="card">
    <h1>Telefones</h1>
    <form id="forme" action="/usuario/salvar/telefone/<?=$_SESSION['id']?>" method="POST">
        <div id="telefone" class="telefone">
            <div class="dados">
                <label> Telefone:</label>
                <input type="fone" name="DS_FONE_USUARIO[]" placeholder="Numero do Telefone">
            </div>
        </div>
        <div class="submit">
            <button type="button" onclick="adicionarTelefone()">Adicionar</button>
            &nbsp;
            &nbsp;
            <button type="reset">Limpar</button>
            &nbsp;
            &nbsp;
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</div>

<script>
    let telefoneCount = 1;

    function adicionarTelefone() {
        telefoneCount++;
        const telefoneDiv = document.getElementById('telefone');
        const novoTelefone = `
        <div class=\"telefone\">
            <div class=\"dados\">
                <label for=\"telefone\"> Telefone:</label>
                <input type=\"tel\" name=\"DS_FONE_USUARIO[]\" placeholder=\"Numero do Telefone\">
            </div>
        </div>`;
        telefoneDiv.insertAdjacentHTML('beforeend', novoTelefone);
    }
</script>
<div class="card">
    <h1>Emails</h1>
    <form id="forme" action="/usuario/salvar/email/{$_SESSION['id']}" method="POST">
        <div id="emails" class="emails">
            <div class="dados">
                <label for="telefone"> Emails:</label>
                <input type="email" name="DS_EMAIL_USUARIO[]" placeholder="Endereço e-mail">
            </div>
        </div>
        <div class="submit">
            <button type="button" onclick="adicionarEmail()">Adicionar</button>
            &nbsp;
            &nbsp;
            <button type="reset">Limpar</button>
            &nbsp;
            &nbsp;
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</div>"

<script>
    let emailCount = 1;

    function adicionarEmail() {
        emailCount++;
        const EmailDiv = document.getElementById('emails');
        const novoEmail = `
        <div class=\"emails\">
            <div class=\"dados\">
                <label for=\"emails\">Emails:</label>
                <input type=\"email\" name=\"DS_EMAIL_USUARIO[]\" placeholder=\"Endereço e-mail\">
            </div>
        </div>`;
        EmailDiv.insertAdjacentHTML('beforeend', novoEmail);
    }
</script>
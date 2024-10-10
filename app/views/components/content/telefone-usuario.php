<div class="card">
    <h1>Digite seu telefone</h1>
    <form method="post">
        <div class="dados">
            <label for="telefone">Telefone:</label>
            <input type="text" name="DS_FONE_USUARIO[]" id="telefone">
        </div>
        <div class="submit">
            &nbsp;
            &nbsp;
            <input type="reset" value="Limpar">
            &nbsp;
            &nbsp;
            <input type="submit" value="Cadastrar">
        </div>
    </form>
</div>
<script>
    function addfone() {
        const addbutton = document.querySelector('#addTelefone');
        const form = document.querySelector('form');
        form.addEventListener('submit', event => {
            event.preventDefault()
        });
    }
</script>
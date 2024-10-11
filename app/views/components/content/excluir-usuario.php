<div class="card">
    <h1>Exclusão de Usuário</h1>
    <form action="/usuario/apagar/<?=$_SESSION['id']?>" method="post">
        <div class="dados">
            <label for="password">Senha:</label>
            <input type="password" name="DS_USUARIO_SENHA" id="password" placeholder="Digite sua senha" required><br>
        </div>
        <div class="submit">
            <input type="reset" value="Limpar" />
            &nbsp;
            <input type="submit" value="Excluir" />
        </div>
    </form>
</div>
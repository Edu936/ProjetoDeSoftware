<?php
    $this->layout('master', ['title' => 'User'])
?>
<h1>Bem vindo a pagina de usuario!</h1>

<form action="/user/atualizar/EduarDo" method="post">
    <div class="data">
        <label for="name">Digite o nome do novo usuário: </label>
        <input type="text" name="name" id="name" value="Eduardo" required>
    </div>
    <div class="data">
        <label for="CPF">Digite o CPF do novo usuário: </label>
        <input type="text" name="CPF" id="CPF" value="119.572.056-44" required>
    </div>
    <div class="data">
        <label for="cargo">Digite o cargo do novo usuário: </label>
        <select name="cargo" id="cargo" required>
            <option value="ATD">Atendente</option>
            <option value="ADM">Administrador</option>
        </select>
    </div>
    <div class="controle">
        <button type="reset">Limpar</button>
        <button type="submit">Confirmar</button>
    </div>
</form>
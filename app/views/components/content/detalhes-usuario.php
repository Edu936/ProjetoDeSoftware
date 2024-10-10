<div class="action-user">
    <button class="option-user">Adcionar Telefone</button>
    <button class="option-user">Adcionar Email</button>
    <button class="option-user">Editar Perfil</button>
    <button class="option-user">Excluir Conta</button>
</div>
<div class="card-user">
    <div class="user-detail">
        <h1>Detalhes do Usuario</h1>
        <fieldset>
            <legend>Dados Pessoais</legend>
            <p>Nome: <?=$usuario->getNome()?></p>
            <p>CPF: <?=$usuario->getCPF()?></p>
            <p>Cargo: <?=$usuario->getCargo()?></p>
            <p>Usuario: <?=$usuario->getUser()?></p>
        </fieldset>
        <fieldset>
            <legend>Endereço</legend>
            <p>N°: <?=$usuario->getNumeroCasa()?></p>
            <p>Rua: <?=$usuario->getRua()?></p>
            <p>Bairro: <?=$usuario->getBairro()?></p>
            <p>CEP: <?=$usuario->getCEP()?></p>
            <p>Cidade: <?=$cidade->getNome()?></p>
            <p>Estado: <?=$cidade->getEstado()?></p>
        </fieldset>
        <fieldset>
            <legend>Telefone</legend>
            <?php
            foreach($telefones as $telefone) {
                echo "<p>Número de Telefone: {$telefone->getTelefone()}</p>";
            }
            ?>
        </fieldset>
        <fieldset>
            <legend>Email</legend>
            <?php
            foreach($telefones as $telefone) {
                echo "<p>Número de Telefone: {$telefone->getTelefone()}</p>";
            }
            ?>
        </fieldset>
    </div>
</div> 

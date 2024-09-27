<div class="controller">
    <form action="controle/cidade/buscar" method="post">
        <input type="text" name="name" placeholder="Nome da Cidade">
    </form>
    <button><a href="/cadastro/cidade">Cadastrar</a></button>
    <button><a href="">Editar</a></button>
    <button><a href="">Excluir</a></button>
</div>
<div class="table">
    <table>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Cidade</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($cidades as $cidade) {
                echo "<tr>";
                echo "<td>{$cidade->getCodigo()}</td>";
                echo "<td>{$cidade->getNome()}</td>";
                echo "<td>{$cidade->getEstado()}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
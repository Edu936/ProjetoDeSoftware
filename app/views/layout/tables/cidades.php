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
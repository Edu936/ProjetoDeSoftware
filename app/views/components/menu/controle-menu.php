<h2>Controle</h2>
<ul>
    <?php
    if ($_SESSION['cargo'] != 'Atendente') {
        echo "<li class=\"options\">";
        echo "<a href=\"/controle/produto\">";
        echo "<i class=\"bi bi-bag-fill\"></i>";
        echo "<span>Produtos</span>";
        echo "</a>";
        echo "</li>";
    }
    ?>
    <?php
    if ($_SESSION['cargo'] != 'Atendente') {
        echo "<li class=\"options\">";
        echo "<a href=\"/controle/servico\">";
        echo "<i class=\"bi bi-brush-fill\"></i>";
        echo "<span>Serviços</span>";
        echo "</a>";
        echo "</li>";
    }
    ?>
    <?php
    if ($_SESSION['cargo'] == 'Atendente') {
        echo "<li class=\"options\">";
        echo "<a href=\"/controle/orcamento\">";
        echo "<i class=\"bi bi-pencil-square\"></i>";
        echo "<span>Orçamentos</span>";
        echo "</a>";
        echo "</li>";
    }
    ?>
    <?php
    if ($_SESSION['cargo'] == 'Atendente') {
        echo "<li class=\"options\">";
        echo "<a href=\"/controle/pedido\">";
        echo "<i class=\"bi bi-clipboard\"></i>";
        echo "<span>Pedidos</span>";
        echo "</a>";
        echo "</li>";
    }
    ?>
    <li class="options">
        <a href="/controle/cidade">
            <i class="bi bi-geo-alt"></i>
            <span>Cidade</span>
        </a>
    </li>
    <li class="options">
        <a href="/controle/cliente">
            <i class="bi bi-person"></i>
            <span>Clientes</span>
        </a>
    </li>
    <?php
    if ($_SESSION['cargo'] == 'Atendente') {
        echo "<li class=\"options\">";
        echo "<a href=\"/controle/veiculo\">";
        echo "<i class=\"bi bi-car-front-fill\"></i>";
        echo "<span>Veiculos</span>";
        echo "</a>";
        echo "</li>";
    }
    ?>
    <?php
    if ($_SESSION['cargo'] != 'Atendente') {
        echo "<li class=\"options\">";
        echo "<a href=\"/controle/fornecedor\">";
        echo "<i class=\"bi bi-box2-fill\"></i>";
        echo "<span>Fornecedores</span>";
        echo "</a>";
        echo "</li>";
    }
    ?>
</ul>
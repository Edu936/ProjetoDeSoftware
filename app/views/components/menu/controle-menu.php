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
    <?php
    echo "<li class=\"options\">";
    echo "<a href=\"/controle/cidade\">";
    echo "<i class=\"bi bi-geo-alt\"></i>";
    echo "<span>Cidade</span>";
    echo "</a>";
    echo "</li>";
    ?>
    <?php
    echo "<li class=\"options\">";
    echo "<a href=\"/controle/cliente\">";
    echo "<i class=\"bi bi-person\"></i>";
    echo "<span>Clientes</span>";
    echo "</a>";
    echo "</li>";
    ?>
    <?php
    if ($_SESSION['cargo'] == 'Atendente') {
        echo "<li class=\"options\">";
        echo "<a href=\"/controle/vaiculo\">";
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
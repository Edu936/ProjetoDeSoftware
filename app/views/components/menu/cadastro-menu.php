<h2>Cadastros</h2>
<ul>
    <?php
    if($_SESSION['cargo'] != "Atendente"){
        echo "<li class=\"options\">";
        echo "<a href=\"/cadastro/produto\">";
        echo "<i class=\"bi bi-bag-fill\"></i>";
        echo "<span>Novo Produto</span>";
        echo "</a>";
        echo "</li>";
    }
    ?>
    <?php
    if($_SESSION['cargo'] != "Atendente"){
        echo "<li class=\"options\">";
        echo "<a href=\"/cadastro/servico\">";
        echo "<i class=\"bi bi-brush-fill\"></i>";
        echo "<span>Novo Servico</span>";
        echo "</a>";
        echo "</li>";
    }
    ?>
    <li class="options">
        <a href="/cadastro/cidade">
            <i class="bi bi-geo-alt"></i>
            <span>Nova Cidade</span>
        </a>
    </li>
    <?php
    if($_SESSION['cargo'] != "Atendente"){
        echo "<li class=\"options\">";
        echo "<a href=\"/cadastro/fornecedor\">";
        echo "<i class=\"bi bi-box2-fill\"></i>";
        echo "<span>Novo Fornecedor</span>";
        echo "</a>";
        echo "</li>";
    }
    ?>
    <li class="options">
        <a href="/cadastro/cliente">
            <i class="bi bi-person-plus"></i>
            <span>Novo Cliente</span>
        </a>
    </li>
    <li class="options">
        <a href="/cadastro/veiculo">
            <i class="bi bi-car-front-fill"></i>
            <span>Novo Veiculo</span>
        </a>
    </li>
</ul>
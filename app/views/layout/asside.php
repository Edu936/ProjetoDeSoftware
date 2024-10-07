<aside id="menu">
    <div class="head-sidebar">
        <h4>Menu</h4>
    </div>
    <nav class="body-sidebar">
        <ul>
            <?php
            if ($_SESSION['cargo'] == "Atendente") {
                echo "<li class=\"options\">";
                echo "<a href=\"/atendimento\">";
                echo "<i class=\"bi bi-clipboard\"></i>";
                echo "<span>Atendimento</span>";
                echo "</a>";
                echo "</li>";
            }
            ?>
            <?php
                echo "<li class=\"options\">";
                echo "<a href=\"/controle\">";
                echo "<i class=\"bi bi-controller\"></i>";
                echo "<span>Controle</span>";
                echo "</a>";
                echo "</li>";
            ?>
            <?php
            echo "<li class=\"options\">";
            echo "<a href=\"/cadastro\">";
            echo "<i class=\"bi bi-pen\"></i>";
            echo "<span>Cadastros</span>";
            echo "</a>";
            echo "</li>";
            ?>
            <?php
            if ($_SESSION['cargo'] != "Atendente") {
                echo "<li class=\"options\">";
                echo "<a href=\"/estatistica\">";
                echo "<i class=\"bi bi-graph-up\"></i>";
                echo "<span>Estatisticas</span>";
                echo "</a>";
                echo "</li>";
            }
            ?>
            <?php
            echo "<li class=\"options\">";
            echo "<a href=\"/configuracao\">";
            echo "<i class=\"bi bi-gear-fill\"></i>";
            echo "<span>Configuração</span>";
            echo "</a>";
            echo "</li>";
            ?>
        </ul>
    </nav>
    <div class="footer-sidebar">
        <a href="/">
            <span class="icon">
                <i class="bi bi-box-arrow-left"></i>
                &nbsp;
                Sair
            </span>
        </a>
    </div>
</aside>
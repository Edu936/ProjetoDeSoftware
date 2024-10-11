<!----------- Configuração da Pagina de Login ------------>
<?php $this->layout('master', ['title'=> $title]) ?>

<!------------------ Styele da Pagina -------------------->
<?php $this->start('css') ?>
<link rel="stylesheet" href="/style/menu.css">
<link rel="stylesheet" href="/style/master.css">
<link rel="stylesheet" href="/style/card.css">
<link rel="stylesheet" href="/style/card-grande.css">
<link rel="stylesheet" href="/style/detalhe-usuario.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $this->stop() ?>

<!------------------ Script da Pagina --------------------->
<?php $this->start('js') ?>
<script src="/javascript/paginas.js"></script>
<script src="/javascript/cadastros.js"></script>
<?php $this->stop() ?>

<!--------------- HTML da Pagina de Login ----------------->
<div class="content">
    <div class="menu">
        <?=$this->insert('components/menu/configuracao-menu')?>  
    </div>
    <section>
        <?php 
            if($this->e($pag) == "index") {
                echo "<img src= \"images/Car wash-bro.png\"/>";
            } 
            else if($this->e($pag) == "detalhe") {
                require_once('components/content/detalhes-usuario.php');
            }
            else if($this->e($pag) == "edicao") {
                require_once('components/content/editar-usuario.php');
            }
            else if($this->e($pag) == "exclusao") {
                require_once('components/content/excluir-usuario.php');
            }
            else if($this->e($pag) == "telefone") {
                echo"<div class=\"card\">
                        <h1>Telefones</h1>
                        <form id=\"forme\" action=\"/usuario/salvar/telefone/{$_SESSION['id']}\" method=\"POST\">
                            <div id=\"telefone\" class=\"telefone\">
                                <div class=\"dados\">
                                    <label for=\"telefone\"> Telefone:</label>
                                    <input type=\"fone\" name=\"DS_FONE_USUARIO[]\" placeholder=\"Numero do Telefone\">
                                </div>
                            </div>
                            <div class=\"submit\">
                                <button type=\"button\" onclick=\"adicionarTelefone()\">Adicionar</button>
                                &nbsp;
                                &nbsp;
                                <button type=\"reset\">Limpar</button>
                                &nbsp;
                                &nbsp;
                                <button type=\"submit\">Cadastrar</button>
                            </div>
                        </form>
                    </div>"
                ;
            }
            else if($this->e($pag) == "email") {
                echo"<div class=\"card\">
                        <h1>Emails</h1>
                        <form id=\"forme\" action=\"/usuario/salvar/email/{$_SESSION['id']}\" method=\"POST\">
                            <div id=\"emails\" class=\"emails\">
                                <div class=\"dados\">
                                    <label for=\"telefone\"> Emails:</label>
                                    <input type=\"email\" name=\"DS_EMAIL_USUARIO[]\" placeholder=\"Endereço e-mail\">
                                </div>
                            </div>
                            <div class=\"submit\">
                                <button type=\"button\" onclick=\"adicionarEmail()\">Adicionar</button>
                                &nbsp;
                                &nbsp;
                                <button type=\"reset\">Limpar</button>
                                &nbsp;
                                &nbsp;
                                <button type=\"submit\">Cadastrar</button>
                            </div>
                        </form>
                    </div>"
                ;
            }
            else if ($this->e($pag) == "finalizar") {
                require_once('components/content/finalizar.php');
            }
        ?>
    </section>
</div>    
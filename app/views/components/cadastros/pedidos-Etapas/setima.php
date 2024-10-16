<div class="card-grande">
    <h1>Confirmar o pagamento</h1>
    <form action="/pedido/pagamento/salvar/<?=$pedido->getCodigo()?>" method="post">
        <div class="dados-cliente">
            <p><strong>Nome do Cliente :</strong> <?=$cliente->getNome()?></p> |
            <p><strong>CPF do Cliente :</strong> <?=$cliente->getCPF()?></p>
        </div>
        <div class="dados-usuario">
            <p><strong>Nome do Usuario :</strong> <?=$usuario->getNome()?></p> |
            <p><strong>CPF do Usuario :</strong> <?=$usuario->getCPF()?></p>
        </div>
        <div class="dados">
            <label for="">Valor Total</label>
            <input type="text" name="valorTotal" id="" value="R$ <?=$pedido->getValor()?>">
        </div>
        <div class="dados">
            <label for="">Desconto</label>
            <input type="text" name="desconto" id="valor">
        </div>
        <div class="dados" id="formaPagamento">
            <label for="pagamento">Forma de Pagamento:</label>
            <select name="pagamento" id="pagamento">
                <option value="Dinheiro">Dinheiro</option>
                <option value="Debito">Débito</option>
                <option value="Credito">Crédito</option>
                <option value="Pix">Pix</option>
            </select>
        </div>
        <div class="dados" id="parcelasDiv" style="display:none;">
            <label for="parcelas">Número de Parcelas:</label>
            <select name="parcelas" id="parcelas">
                <option value="1">1 vezes</option>
                <option value="2">2 vezes</option>
                <option value="3">3 vezes</option>
                <option value="4">4 vezes</option>
                <option value="5">5 vezes</option>
                <option value="6">6 vezes</option>
                <option value="7">7 vezes</option>
                <option value="8">8 vezes</option>
                <option value="9">9 vezes</option>
                <option value="10">10 vezes</option>
            </select>
        </div>
        <div class="submit">
            <button type="reset">Limpar</button>
            &nbsp;
            &nbsp;
            <button type="submit">Finalizar Pedido</button>
        </div>
    </form>
</div>
<script>
    const valorInput = document.getElementById("valor");

    document.addEventListener("DOMContentLoaded", function() {
        const formaPagamento = document.getElementById("pagamento");
        const parcelasDiv = document.getElementById("parcelasDiv");

        parcelasDiv.style.display = "none";

        formaPagamento.addEventListener("change", function() {
            if (this.value === "Credito") {
                parcelasDiv.style.display = "block";
            } else {
                parcelasDiv.style.display = "none";
            }
        });
        valorInput.addEventListener("input", function() {
            let value = this.value.replace(/\D/g, ''); // Remove qualquer caractere não numérico
            value = (value / 100).toFixed(2) + ''; // Divide por 100 para formatar como valor monetário
            value = value.replace('.', ','); // Substitui o ponto por vírgula
            value = value.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'); // Adiciona o ponto como separador de milhar
            this.value = 'R$ ' + value; // Adiciona o símbolo de R$
        });
    });
</script>
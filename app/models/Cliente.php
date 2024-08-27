<?php

namespace app\model;

use Pedido;
use app\model\interface\ICliente;


final class Cliente extends User implements ICliente
{
    private $cpf;

    function __construct($nome, $endRua, $endCep, $endNumero, $endBairro, $cpf, $cidade)
    {
        $this->setCpf($cpf);
        $this->setNome($nome);
        $this->setEndRua($endRua);
        $this->setCidade($cidade);
        $this->setEndCep($endCep);
        $this->setEndNumero($endNumero);
        $this->setEndBairro($endBairro);
    }

    function getCpf(): int
    {
        return $this->cpf;
    }

    function setCpf($cpf): void
    {
        $this->cpf = $cpf;
    }

    #[\Override]
    public function fazerPedido (): Pedido
    {
        $pedido = new Pedido;
        return $pedido;
    }
    #[\Override]
    public function cancelarPedido(): void {}
    #[\Override]
    public function pagaPedido(): bool
    {
        return true;
    }
}

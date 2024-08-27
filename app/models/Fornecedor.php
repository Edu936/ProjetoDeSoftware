<?php

namespace app\model;

final class Fornecedor extends User
{
    private $cnpj;

    function __construct($nome, $endRua, $endCep, $endNumero, $endBairro, $cnpj, $cidade)
    {
        $this->setCnpj($cnpj);
        $this->setNome($nome);
        $this->setEndRua($endRua);
        $this->setEndRua($endRua);
        $this->setEndCep($endCep);
        $this->setEndNumero($endNumero);
        $this->setEndBairro($endBairro);
    }

    public function setCnpj($cnpj): void
    {
        $this->cnpj = $cnpj;
    }

    public function getCnpj(): int
    {
        return $this->cnpj;
    }
}

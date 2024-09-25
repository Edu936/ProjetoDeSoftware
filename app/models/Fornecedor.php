<?php

namespace app\models;

class Fornecedor extends Model
{
    private int $CD_FORNECEDOR;
    private string $NM_FORNECEDOR;
    private string $DS_CNPJ_FORNECEDOR;
    private int $DS_NUMERO;
    private string $DS_RUA;
    private string $DS_BAIRRO;
    private string $DS_CEP;
    private int $CD_CIDADE;

    public function __construct()
    {
        $this->table = "tb_fornecedor";
    }

    //codigo
    public function getCodigo(): int
    {
        return $this->CD_FORNECEDOR;
    }

    public function setCodigo(int $codigo): void
    {
        $this->CD_FORNECEDOR = $codigo;
    }

    //Cidade
    public function getCidade(): int
    {
        return $this->CD_CIDADE;
    }

    public function setCidade(Cidade $cidade): void
    {
        $this->CD_CIDADE = $cidade->getCodigo();
    }

    //Nome
    public function getNome(): string
    {
        return $this->NM_FORNECEDOR;
    }

    public function setNome(string $nome): void
    {
        $this->NM_FORNECEDOR = $nome;
    }

    //CPF
    public function getCPF(): string
    {
        return $this->DS_CNPJ_FORNECEDOR;
    }

    public function setCPF(string $CNPJ) : void 
    {
        $this->DS_CNPJ_FORNECEDOR = $CNPJ;   
    }

    //Numero de Casa
    public function setNumeroCasa(int $numeroCasa) : void
    {
        $this->DS_NUMERO = $numeroCasa;
    }

    
    public function getNumeroCasa() : int
    {
        return $this->DS_NUMERO;
    }

    //Rua
    public function getRua() : string 
    {
        return $this->DS_RUA;    
    }

    public function setRua(string $rua) : void 
    {
        $this->DS_RUA = $rua;
    }

    //Bairro
    public function getBairro() : string 
    {
        return $this->DS_BAIRRO;    
    }

    public function setBairro(string $bairro) : void 
    {
        $this->DS_BAIRRO = $bairro;    
    }

    //CEP
    public function getCEP() : string 
    {
        return $this->DS_CEP;    
    }

    public function setCEP(string $CEP) : void 
    {
        $this->DS_CEP = $CEP;    
    }
}
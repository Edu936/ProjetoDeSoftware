<?php

namespace app\models;

class Usuario extends Model
{
    private string $CD_USUARIO;
    private string $NM_USUARIO;
    private string $DS_USUARIO_CARGO;
    private string $DS_CPF_USUARIO;
    private string $DS_USUARIO_USER;
    private string $DS_USUARIO_SENHA;
    private int $DS_NUMERO;
    private string $DS_RUA;
    private string $DS_BAIRRO;
    private string $DS_CEP;
    private ?int $CD_CIDADE;

    public function __construct()
    {
        $this->table = "tb_usuario";
    }

    //Cargo
    public function getCargo() : string 
    {
        return  $this->DS_USUARIO_CARGO;    
    }

    public function setCargo(string $cargo) : void 
    {
        $this->DS_USUARIO_CARGO = $cargo;
    }

    //User
    public function getUser() : string 
    {
        return $this->DS_USUARIO_USER;
    }

    public function setUser(string $user) : void 
    {
        $this->DS_USUARIO_USER = $user;    
    }

    //Senha
    public function getSenha() : string 
    {
        return $this->DS_USUARIO_SENHA;    
    }

    public function setSenha(string $senha) : void 
    {
        $this-> DS_USUARIO_SENHA = $senha;    
    }

    //codigo
    public function getCodigo()
    {
        return $this->CD_USUARIO;
    }

    public function setCodigo(int $codigo): void
    {
        $this->CD_USUARIO = $codigo;
    }

    //Cidade
    public function getCidade(): ?int
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
        return $this->NM_USUARIO;
    }

    public function setNome(string $nome): void
    {
        $this->NM_USUARIO = $nome;
    }

    //CPF
    public function getCPF(): string
    {
        return $this->DS_CPF_USUARIO;
    }

    public function setCPF(string $CPF) : void 
    {
        $this->DS_CPF_USUARIO = $CPF;   
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

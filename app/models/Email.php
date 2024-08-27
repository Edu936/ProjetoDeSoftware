<?php

namespace app\model;

final class Email
{
    private int $codigo;
    private string $user;
    private string $email;
    
    function __construct($email, $user)
    {
        $this->setUser($user);
        $this->setEmail($email);
    }

    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function getEmail(): int
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getUser(): int
    {
        return $this->user;
    }

    public function setUser($user): void
    {
        $this->user = $user;
    }
}

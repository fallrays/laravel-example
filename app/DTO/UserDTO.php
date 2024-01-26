<?php

namespace App\DTO;

class UserDTO
{
    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private string $hp;
    private string $created_at;
    private string $updated_at;

    public function __construct(
        $id, 
        $name, 
        $email, 
        $password, 
        $hp, 
        $created_at,
        $updated_at
    )
    {
        $this->id = (int)$id;
        $this->name = (string)$name;
        $this->email = (string)$email;
        $this->password = (string)$password;
        $this->hp = (string)$hp;
        $this->created_at = (string)$created_at;
        $this->updated_at = (string)$updated_at;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getHp(): string
    {
        return $this->hp;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }
}
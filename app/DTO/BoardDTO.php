<?php

namespace App\DTO;

class BoardDTO
{
    private string $name;
    private string $email;
    private string $password;
    private string $title;
    private string $content;
    private int $id;
    private string $created_at;
    private string $updated_at;

    public function __construct(
        $name, 
        $email, 
        $password, 
        $title, 
        $content,
        $id=0, 
        $created_at='',
        $updated_at=''
    )
    {
        $this->name = (string)$name;
        $this->email = (string)$email;
        $this->password = (string)$password;
        $this->title = (string)$title;
        $this->content = (string)$content;
        $this->id = (int)$id;
        $this->created_at = (string)$created_at;
        $this->updated_at = (string)$updated_at;
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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getId(): int
    {
        return $this->id;
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

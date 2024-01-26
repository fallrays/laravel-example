<?php

namespace App\DTO\Board;

class GetDTO
{
    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private string $title;
    private string $content;
    private string $attach;
    private string $created_at;
    private string $updated_at;

    public function __construct(
        $id, 
        $name, 
        $email, 
        $password, 
        $title, 
        $content,
        $attach,
        $created_at,
        $updated_at
    )
    {
        $this->id = (int)$id;
        $this->name = (string)$name;
        $this->email = (string)$email;
        $this->password = (string)$password;
        $this->title = (string)$title;
        $this->content = (string)$content;
        $this->attach = (string)$attach;
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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getAttach(): string
    {
        return $this->attach;
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
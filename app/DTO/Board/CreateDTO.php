<?php

namespace App\DTO\Board;

class CreateDTO
{
    private string $name;
    private string $email;
    private string $password;
    private string $title;
    private string $content;
    private string $attach;

    public function __construct(
        $name, 
        $email='', 
        $password, 
        $title, 
        $content,
        $attach
    )
    {
        $this->name = (string)$name;
        $this->email = (string)$email;
        $this->password = (string)$password;
        $this->title = (string)$title;
        $this->content = (string)$content;
        $this->attach = (string)$attach;
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
}
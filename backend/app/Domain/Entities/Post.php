<?php

namespace App\Domain\Entities;

class Post
{
    public function __construct(
        private readonly int $id,
        private readonly int $userId,
        private string $content,
        private ?string $image = null,
    ) {}

    public function id(): int
    {
        return $this->id;
    }

    public function userId(): int
    {
        return $this->userId;
    }


    public function content(): string
    {
        return $this->content;
    }

    public function image(): ?string
    {
        return $this->image;
    }
}
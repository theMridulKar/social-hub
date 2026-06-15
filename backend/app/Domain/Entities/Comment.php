<?php

namespace App\Domain\Entities;

class Comment
{
    public function __construct(
        private readonly int $id,
        private readonly int $userId,
        private readonly int $postId,
        private string $content,
    ) {}

    public function id(): int
    {
        return $this->id;
    }

    public function userId(): int
    {
        return $this->userId;
    }

    public function postId(): int
    {
        return $this->postId;
    }

    public function content(): string
    {
        return $this->content;
    }
}
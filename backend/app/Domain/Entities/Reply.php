<?php

namespace App\Domain\Entities;

class Reply
{
    public function __construct(
        private readonly int $id,
        private readonly int $userId,
        private readonly int $commentId,
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

    public function commentId(): int
    {
        return $this->commentId;
    }

    public function content(): string
    {
        return $this->content;
    }
}
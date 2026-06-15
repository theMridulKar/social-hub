<?php

namespace App\Domain\Entities;

class Like
{
    public function __construct(
        private readonly int $id,
        private readonly int $userId,
        private readonly int $likeableId,
        private readonly string $likeableType,
    ) {}

    public function id(): int
    {
        return $this->id;
    }

    public function userId(): int
    {
        return $this->userId;
    }

    public function likeableId(): int
    {
        return $this->likeableId;
    }

    public function likeableType(): string
    {
        return $this->likeableType;
    }
}
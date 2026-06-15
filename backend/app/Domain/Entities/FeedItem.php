<?php

namespace App\Domain\Entities;

class FeedItem
{
    public function __construct(
        private readonly int $postId,
        private readonly int $userId,
        private readonly string $content,
        private readonly ?string $image,
        private readonly int $likesCount,
        private readonly array $comments = [],
    ) {}

    public function postId(): int
    {
        return $this->postId;
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

    public function likesCount(): int
    {
        return $this->likesCount;
    }

    public function comments(): array
    {
        return $this->comments;
    }
}
<?php

namespace App\Application\DTOs\Comment;

class CreateCommentDTO
{
    public function __construct(
        public readonly int $userId,
        public readonly int $postId,
        public readonly string $content,
    ) {}
}
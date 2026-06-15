<?php

namespace App\Application\DTOs\Reply;

class CreateReplyDTO
{
    public function __construct(
        public readonly int $userId,
        public readonly int $commentId,
        public readonly string $content,
    ) {}
}
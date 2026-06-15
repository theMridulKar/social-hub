<?php

namespace App\Application\DTOs\Like;

class ToggleLikeDTO
{
    public function __construct(
        public readonly int $userId,
        public readonly int $likeableId,
        public readonly string $likeableType,
    ) {}
}
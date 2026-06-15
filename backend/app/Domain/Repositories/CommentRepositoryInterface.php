<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Comment;

interface CommentRepositoryInterface
{
    public function create(array $data): Comment;

    public function findById(int $id): ?Comment;

    public function getByPostId(int $postId): array;
}
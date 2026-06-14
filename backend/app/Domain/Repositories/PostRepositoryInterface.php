<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Post;

interface PostRepositoryInterface
{
    public function create(array $data): Post;

    public function findById(int $id): ?Post;

    /**
     * @return Post[]
     */
    public function getAll(): array;

    public function delete(int $id): void;
}
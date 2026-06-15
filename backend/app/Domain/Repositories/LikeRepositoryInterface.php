<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Like;

interface LikeRepositoryInterface
{
    public function create(array $data): Like;

    public function findExisting(int $userId, int $likeableId, string $likeableType): ?Like;

    public function delete(int $id): void;
}
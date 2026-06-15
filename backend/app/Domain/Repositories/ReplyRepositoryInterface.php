<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Reply;

interface ReplyRepositoryInterface
{
    public function create(array $data): Reply;

    public function findById(int $id): ?Reply;

}
<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\Entities\Like as DomainLike;
use App\Domain\Repositories\LikeRepositoryInterface;
use App\Infrastructure\Persistence\Models\Like as LikeModel;

class LikeRepository implements LikeRepositoryInterface
{
    public function create(array $data): DomainLike
    {
        $like = LikeModel::create($data);
        return $this->toDomain($like);
    }

    public function findExisting(int $userId, int $likeableId, string $likeableType): ?DomainLike {

        $like = LikeModel::query()
            ->where('user_id', $userId)
            ->where('likeable_id', $likeableId)
            ->where('likeable_type', $likeableType)
            ->first();

        return $like ? $this->toDomain($like) : null;
    }

    public function delete(int $id): void
    {
        LikeModel::destroy($id);
    }

    private function toDomain(LikeModel $like ): DomainLike {

        return new DomainLike(
            id: $like->id,
            userId: $like->user_id,
            likeableId: $like->likeable_id,
            likeableType: $like->likeable_type,
        );
    }
}
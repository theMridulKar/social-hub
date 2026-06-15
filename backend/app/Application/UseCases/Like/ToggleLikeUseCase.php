<?php

namespace App\Application\UseCases\Like;

use App\Application\DTOs\Like\ToggleLikeDTO;
use App\Domain\Repositories\LikeRepositoryInterface;

class ToggleLikeUseCase
{
    public function __construct(
        private LikeRepositoryInterface $likes,
    ) {}

    public function execute(ToggleLikeDTO $dto): array {

        $existingLike = $this->likes->findExisting(
            userId: $dto->userId,
            likeableId: $dto->likeableId,
            likeableType: $dto->likeableType,
        );

        if ($existingLike) {

            $this->likes->delete($existingLike->id());

            return [
                'liked' => false,
                'message' => 'Unliked successfully',
            ];
        }

        $this->likes->create([
            'user_id'       => $dto->userId,
            'likeable_id'   => $dto->likeableId,
            'likeable_type' => $dto->likeableType,
        ]);

        return [
            'liked' => true,
            'message' => 'Liked successfully',
        ];
    }
}
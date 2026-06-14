<?php

namespace App\Application\UseCases\Post;

use App\Domain\Entities\Post;
use App\Application\DTOs\Post\CreatePostDTO;
use App\Domain\Repositories\PostRepositoryInterface;

class CreatePostUseCase
{
    public function __construct(
        private PostRepositoryInterface $posts,
    ) {}

    public function execute(CreatePostDTO $dto): Post {

        return $this->posts->create([
            'user_id' => $dto->userId,
            'content' => $dto->content,
            'image'   => $dto->image,
        ]);
    }
}
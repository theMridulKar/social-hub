<?php

namespace App\Application\UseCases\Comment;

use App\Domain\Entities\Comment;
use App\Application\DTOs\Comment\CreateCommentDTO;
use App\Domain\Repositories\CommentRepositoryInterface;
use App\Domain\Exceptions\Comment\PostNotFoundException;
use App\Domain\Repositories\PostRepositoryInterface;

class CreateCommentUseCase
{
    public function __construct(
        private CommentRepositoryInterface $comments,
        private PostRepositoryInterface $posts,
    ) {}

    public function execute(CreateCommentDTO $dto): Comment {

        $post = $this->posts->findById($dto->postId);

        if (!$post) {
            throw new PostNotFoundException();
        }

        return $this->comments->create([
            'user_id' => $dto->userId,
            'post_id' => $dto->postId,
            'content' => $dto->content,
        ]);
    }
}
<?php

namespace App\Application\UseCases\Reply;

use App\Domain\Entities\Reply;
use App\Application\DTOs\Reply\CreateReplyDTO;
use App\Domain\Repositories\ReplyRepositoryInterface;
use App\Domain\Repositories\CommentRepositoryInterface;
use App\Domain\Exceptions\Reply\CommentNotFoundException;

class CreateReplyUseCase
{
    public function __construct(
        private ReplyRepositoryInterface $replies,
        private CommentRepositoryInterface $comments,
    ) {}

    public function execute(
        CreateReplyDTO $dto
    ): Reply {

        $comment = $this->comments->findById(
            $dto->commentId
        );

        if (!$comment) {
            throw new CommentNotFoundException();
        }

        return $this->replies->create([
            'user_id'    => $dto->userId,
            'comment_id' => $dto->commentId,
            'content'    => $dto->content,
        ]);
    }
}
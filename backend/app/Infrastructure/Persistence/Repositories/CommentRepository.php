<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\Entities\Comment as DomainComment;
use App\Domain\Repositories\CommentRepositoryInterface;
use App\Infrastructure\Persistence\Models\Comment as CommentModel;

class CommentRepository implements CommentRepositoryInterface
{
    public function create(array $data): DomainComment
    {
        $comment = CommentModel::create($data);
        return $this->toDomain($comment);
    }

    public function findById(int $id): ?DomainComment
    {
        $comment = CommentModel::find($id);
        return $comment ? $this->toDomain($comment) : null;
    }

    public function getByPostId(int $postId): array
    {
        return CommentModel::query()->where('post_id', $postId)->latest()->get()->map(
                fn (CommentModel $comment)
                    => $this->toDomain($comment)
            )
            ->all();
    }

    private function toDomain(CommentModel $comment): DomainComment {

        return new DomainComment(
            id: $comment->id,
            userId: $comment->user_id,
            postId: $comment->post_id,
            content: $comment->content,
        );
    }
}
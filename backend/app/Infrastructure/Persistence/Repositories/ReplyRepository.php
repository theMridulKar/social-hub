<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\Entities\Reply as DomainReply;
use App\Domain\Repositories\ReplyRepositoryInterface;
use App\Infrastructure\Persistence\Models\Reply as ReplyModel;

class ReplyRepository implements ReplyRepositoryInterface
{
    public function create(array $data): DomainReply
    {
        $reply = ReplyModel::create($data);
        return $this->toDomain($reply);
    }

    public function findById(int $id): ?DomainReply
    {
        $reply = ReplyModel::find($id);
        return $reply ? $this->toDomain($reply) : null;
    }

    private function toDomain(ReplyModel $reply): DomainReply {

        return new DomainReply(
            id: $reply->id,
            userId: $reply->user_id,
            commentId: $reply->comment_id,
            content: $reply->content,
        );
    }
}
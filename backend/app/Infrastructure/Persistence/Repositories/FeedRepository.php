<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\Repositories\FeedRepositoryInterface;
use App\Infrastructure\Persistence\Models\Post as PostModel;

class FeedRepository implements FeedRepositoryInterface
{
    public function getFeed(): array
    {
        return PostModel::query()
            ->with([
                'user',

                'comments',
                'comments.user',
                'comments.likes',

                'comments.replies',
                'comments.replies.user',
                'comments.replies.likes',
            ])
            ->withCount(['likes', 'comments',
            ])->latest()->get()->all();
    }
}
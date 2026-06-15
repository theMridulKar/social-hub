<?php

namespace App\Application\UseCases\Feed;

use App\Domain\Repositories\FeedRepositoryInterface;

class GetFeedUseCase
{
    public function __construct(
        private FeedRepositoryInterface $feeds,
    ) {}

    public function execute(): array
    {
        return $this->feeds->getFeed();
    }
}
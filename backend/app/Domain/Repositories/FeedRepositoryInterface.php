<?php

namespace App\Domain\Repositories;

interface FeedRepositoryInterface
{
    public function getFeed(): array;
}
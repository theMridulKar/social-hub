<?php

namespace App\Domain\Services\Auth;

interface TokenServiceInterface
{
    public function create(int $userId): string;

    public function revokeAll(int $userId): void;
}
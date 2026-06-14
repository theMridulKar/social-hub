<?php

namespace App\Application\UseCases\Auth;

use App\Domain\Services\Auth\TokenServiceInterface;

class LogoutUserUseCase
{
    public function __construct(
        private TokenServiceInterface $tokens
    ) {}

    public function execute(int $userId): void {

        $this->tokens->revokeAll($userId);

    }
}
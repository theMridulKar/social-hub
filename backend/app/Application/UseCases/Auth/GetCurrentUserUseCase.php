<?php

namespace App\Application\UseCases\Auth;

use App\Domain\Entities\User;
use App\Domain\Repositories\UserRepositoryInterface;
use App\Domain\Exceptions\Auth\UserNotFoundException;

class GetCurrentUserUseCase
{
    public function __construct(
        private UserRepositoryInterface $users
    ) {}

    public function execute(int $userId): User
    {
        $user = $this->users->findById($userId);

        if (!$user) {
            throw new UserNotFoundException();
        }

        return $user;
    }
}
<?php

namespace App\Application\UseCases\Auth;

use App\Application\DTOs\Auth\LoginUserDTO;
use App\Domain\Repositories\UserRepositoryInterface;
use App\Domain\Services\Auth\{TokenServiceInterface, PasswordHasherInterface};
use App\Domain\Exceptions\Auth\InvalidCredentialsException;

class LoginUserUseCase
{
    public function __construct(
        private UserRepositoryInterface $users,
        private TokenServiceInterface $tokens,
        private PasswordHasherInterface $hasher,
    ) {}


    public function execute(LoginUserDTO $dto): array {

        $user = $this->users->findByEmail($dto->email);

        if (!$user) {
            throw new InvalidCredentialsException();
        }

        if (!$this->hasher->verify($dto->password, $user->password())) {
            throw new InvalidCredentialsException();
        }

        $token = $this->tokens->create($user->id());

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
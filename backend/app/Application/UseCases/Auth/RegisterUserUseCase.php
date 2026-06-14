<?php
namespace App\Application\UseCases\Auth;

use App\Domain\Entities\User;
use App\Domain\Repositories\UserRepositoryInterface;
use App\Application\DTOs\Auth\RegisterUserDTO;
use Illuminate\Contracts\Hashing\Hasher as PasswordHasherInterface;

class RegisterUserUseCase
{
    public function __construct(
        private UserRepositoryInterface $users,
        private PasswordHasherInterface $hasher,
    ) {}

    public function execute(RegisterUserDTO $dto): User {

        return $this->users->create([
            'first_name' => $dto->firstName,
            'last_name'  => $dto->lastName,
            'email'      => $dto->email,
            'password'   => $this->hasher->make($dto->password),
            'is_active'  => true,
        ]);
    }
}
<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\Entities\User as DomainUser;
use App\Domain\Repositories\UserRepositoryInterface;
use App\Infrastructure\Persistence\Models\User as UserModel;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data): DomainUser
    {
        $user = UserModel::create($data);
        return $this->toDomain($user);
    }

    public function findByEmail(string $email): ?DomainUser
    {
        $user = UserModel::query()->where('email', $email)->first();
        return $user ? $this->toDomain($user) : null;
    }

    public function findById(int $id): ?DomainUser
    {
        $user = UserModel::find($id);
        return $user ? $this->toDomain($user) : null;
    }

    private function toDomain(UserModel $user): DomainUser
    {
        return new DomainUser(
            id: $user->id,
            firstName: $user->first_name,
            lastName: $user->last_name,
            email: $user->email,
            password: $user->password,
            isActive: $user->is_active,
            avatar: $user->avatar,
        );
    }
}
<?php

namespace App\Infrastructure\Services\Auth;

use App\Domain\Services\Auth\TokenServiceInterface;
use App\Infrastructure\Persistence\Models\User;

class SanctumTokenService implements TokenServiceInterface
{
    public function create(int $userId): string {

        $user = User::findOrFail($userId);
        return $user->createToken('auth_token')->plainTextToken;
    }

    public function revokeAll(int $userId): void {

        User::findOrFail($userId)->tokens()->delete();
    }
}
<?php

namespace App\Infrastructure\Services\Auth;

use Illuminate\Support\Facades\Hash;
use App\Domain\Services\Auth\PasswordHasherInterface;

class BcryptPasswordHasher implements PasswordHasherInterface
{
    public function hash(string $password): string {

        return Hash::make($password);
    }

    public function verify(string $plain, string $hashed): bool {

        return Hash::check($plain, $hashed);
    }
}
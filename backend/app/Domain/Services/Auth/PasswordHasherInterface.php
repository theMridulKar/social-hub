<?php

namespace App\Domain\Services\Auth;

interface PasswordHasherInterface
{
    public function hash(string $password): string;

    public function verify(string $plain, string $hashed): bool;
}
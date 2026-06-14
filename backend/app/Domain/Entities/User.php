<?php

namespace App\Domain\Entities;

class User
{
    public function __construct(
        private readonly int $id,
        private string $firstName,
        private string $lastName,
        private string $email,
        private string $password,
        private bool $isActive = true,
        private ?string $avatar = null,
    ) {}

    public function id(): int
    {
        return $this->id;
    }

    public function firstName(): string
    {
        return $this->firstName;
    }

    public function lastName(): string
    {
        return $this->lastName;
    }

    public function fullName(): string
    {
        return "{$this->firstName} {$this->lastName}";
    }

    public function avatar(): ?string
    {
        return $this->avatar;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function canLogin(): bool
    {
        return $this->isActive;
    }

}
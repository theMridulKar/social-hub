<?php

namespace App\Presentation\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id(),
            'first_name' => $this->firstName(),
            'last_name'  => $this->lastName(),
            'full_name'  => $this->fullName(),
            'email'      => $this->email(),
            'avatar'     => $this->avatar(),
            'is_active'  => $this->isActive(),
        ];
    }
}
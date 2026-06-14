<?php

namespace App\Presentation\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'       => $this->id(),
            'user_id'  => $this->userId(),
            'content'  => $this->content(),
            'image'    => $this->image(),
        ];
    }
}
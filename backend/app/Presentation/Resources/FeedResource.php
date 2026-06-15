<?php

namespace App\Presentation\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeedResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'image' => $this->image,

            'user' => [
                'id' => $this->user?->id,
                'first_name' => $this->user?->first_name,
                'last_name' => $this->user?->last_name,
                'avatar' => $this->user?->avatar,
            ],

            'likes_count' => $this->likes->count(),

            'comments_count' => $this->comments->count(),

            'comments' => $this->comments->map(function ($comment) {
                return [
                    'id' => $comment->id,
                    'content' => $comment->content,

                    'user' => [
                        'id' => $comment->user?->id,
                        'first_name' => $comment->user?->first_name,
                        'last_name' => $comment->user?->last_name,
                    ],

                    'likes_count' => $comment->likes->count(),

                    'replies' => $comment->replies->map(function ($reply) {
                        return [
                            'id' => $reply->id,
                            'content' => $reply->content,

                            'user' => [
                                'id' => $reply->user?->id,
                                'first_name' => $reply->user?->first_name,
                                'last_name' => $reply->user?->last_name,
                            ],

                            'likes_count' => $reply->likes->count(),
                        ];
                    }),
                ];
            }),
        ];
    }
}
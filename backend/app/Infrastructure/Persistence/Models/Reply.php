<?php

namespace App\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable =  [
        'content',
        'user_id',
        'comment_id',
        'likes_count',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}

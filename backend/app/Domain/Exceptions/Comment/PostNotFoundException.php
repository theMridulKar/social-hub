<?php

namespace App\Domain\Exceptions\Comment;

use Exception;

class PostNotFoundException extends Exception
{
    protected $message = 'Comment not found.';
}
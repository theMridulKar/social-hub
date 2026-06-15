<?php

namespace App\Domain\Exceptions\Reply;

use Exception;

class CommentNotFoundException extends Exception
{
    protected $message = 'Comment not found.';
}
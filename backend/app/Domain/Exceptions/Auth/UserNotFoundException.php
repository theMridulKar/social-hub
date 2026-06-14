<?php

namespace App\Domain\Exceptions\Auth;

use Exception;

class UserNotFoundException extends Exception
{
    protected $message = 'User not found.';
}
<?php

namespace App\Domain\Exceptions\Auth;

use Exception;

class InvalidCredentialsException extends Exception
{
    protected $message = 'Invalid credentials.';
}
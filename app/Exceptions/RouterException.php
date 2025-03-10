<?php

namespace Api\Instagram\Exceptions;

use Exception;

class RouterException extends Exception
{

    public function __construct(string $message,  int $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

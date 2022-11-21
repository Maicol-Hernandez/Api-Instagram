<?php

class ErrorHandler
{

    public function __construct()
    {
    }

    public static function handleException(Throwable $exception): void
    {
        # code...
        http_response_code(500);
        echo json_encode([
            "code" => $exception->getCode(),
            "message" => $exception->getMessage(),
            "file" => $exception->getFile(),
            "line" => $exception->getLine()
        ]);
    }
}

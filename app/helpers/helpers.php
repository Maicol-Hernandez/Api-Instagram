<?php

if (!function_exists('view')) {
    function view(
        string $type,
        $data = null,
        int $status_code = 200,
        array $headers = []
    ): Api\Instagram\Response {
        return new Api\Instagram\Response($type, $data, $status_code, $headers);
    }
}

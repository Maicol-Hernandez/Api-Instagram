<?php

namespace Api\Instagram;

use Api\Instagram\Exceptions\ApiException;
use JsonSerializable;

class Response
{

    private array $headers = [];
    private string $response = "";
    private int $status_code = 0;

    public function __construct(
        string $type,
        $data = null,
        int $status_code = 200,
        array $headers = []
    ) {
        $this->status_code = $status_code;

        Response::headersTolower($headers);
        Response::validateStatusCode($status_code);
        Response::validateType($type, $data);
    }

    private static function headersTolower(array $headers): void
    {
        foreach ($headers as $header_name  => $header_value) {
            self::$headers[strtolower($header_name)] = $header_value;
        }
    }

    private static function validateStatusCode($status_code): void
    {
        # validamos el codigo de estado de la respuesta 

        if (self::$status_code < 100 || self::$status_code > 599) {
            # Invalid status code, must be a number between 100 and 599
            throw new ApiException("Invalid status code {$status_code}, must be a number between 100 and 599");
        }
    }

    private static function validateType(string $type, $data): void
    {
        # code...
        switch ($type) {
            case 'raw':
                # code...
                self::raw($data);
                break;
            case 'json':
                self::json($data);
                break;

            case 'html';
                self::html($data);
                break;

            default:
                # we respond with an exception
                throw new ApiException("Invalid Response Type {$type}, only valids are raw, json and html");
                break;
        }
    }

    private function raw(string $data): void
    {
        # validamos que tenga un content-type
        if (empty($this->headers['content-type'])) {
            # text/plain; charset=utf-8
            $this->headers['content-type'] = 'text/plain; charset=utf-8';
        }

        $this->response = $data;
    }

    private function json($data): void
    {
        # definimos los headers en el content-type con el application/json; charset=utf-8
        $this->headers['content-type'] = 'application/json; charset=utf-8';

        if ($this->status_code > 399) {
            $response = [
                'status' => 'error',
                'error' => $data
            ];
        } else {
            $response = [
                'status' => 'success',
                'data' => $data
            ];
        }

        $this->response = $response;
    }

    private function html(string $data): void
    {
        # text/html; charset=utf-8
        $this->headers['content-type'] = 'text/html; charset=utf-8';

        $this->response = $data;
    }

    public function returnData()
    {
        # code...
        foreach ($this->headers as $header_name => $header_value) {
            # code...
            header("$header_name: $header_value");
        }

        http_response_code($this->status_code);

        echo $this->response;
    }
}

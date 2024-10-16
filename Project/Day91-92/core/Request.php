<?php

class Request
{
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function header($chave)
    {
        $headers = getallheaders();
        return (isset($headers[$chave])) ? $headers[$chave] : '';
    }

    public static function body()
    {
        $data = [];

        switch (self::method()) {
            case 'GET':
            case 'DELETE':
                $data = $_GET;
                break;
            case 'POST':
                $data = $_POST;
                break;
            case 'PUT':
                parse_str(file_get_contents('php://input') ?? '', $data);
                break;
        }

        return $data;
    }

    public static function bodyJson()
    {
        $json = json_decode(file_get_contents('php://input'), true) ?? [];

        return $json;
    }
}

<?php


function exactMatchUriInArrayRoutes($uri, $routes)
{
    return (array_key_exists($uri, $routes)) ?
    [$uri => $routes[$uri]] :
    [];
}

function regularExpressionMatchArrayRoutes($uri, $routes)
{
    return array_filter(

        
        $routes,
        function ($value) use ($uri) {
            $regex = str_replace('/', '\/', ltrim($value, '/'));
            return preg_match("/^$regex$/", ltrim($uri, '/'));
        },
        ARRAY_FILTER_USE_KEY
    );
}

function params($uri, $matchedUri)
{
    if (!empty($matchedUri)) {
        $matchedToGetParams = array_keys($matchedUri)[0];
        return array_diff(
            $uri,
            explode('/', ltrim($matchedToGetParams, '/'))
        );
    }
    return [];
}

function paramsFormat($uri, $params)
{
    $paramsData = [];
    foreach ($params as $index => $param) {
        $paramsData[$uri[$index - 1]] = $param;
    }

    return $paramsData;
}


function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $routes = require 'routes.php';
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    $matchedUri = exactMatchUriInArrayRoutes($uri, $routes[$requestMethod]);

    $params = [];
    if (empty($matchedUri)) {
        $matchedUri = regularExpressionMatchArrayRoutes($uri, $routes[$requestMethod]);
        $uri = explode('/', ltrim($uri, '/'));
        $params = params($uri, $matchedUri);
        $params = paramsFormat($uri, $params);
    }

    if ($_ENV['MAINTENANCE'] === 'true') {
        $matchedUri = ['/maintenance' => 'Maintenance@index'];
    }

    // dd($matchedUri);


    if (!empty($matchedUri)) {
        return controller($matchedUri, $params);
    }


    throw new Exception('Algo deu errado');
}
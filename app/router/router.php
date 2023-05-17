<?php

function routes()
{
    return require 'routes.php';
}

function exactMatchUriRoutes($uri, $routes)
{
    if (array_key_exists($uri,$routes)) {
        return [$uri => $routes[$uri]];
    } else {
       return [];

    }
}

function regularExpressionArrayRoutes($uri,$routes)
{
    return  array_filter(
        $routes,
        function ($value) use ($uri) {
            $regex = str_replace('/','\/',ltrim($value,'/'));
//                    return preg_match("/^$regex$/",ltrim($uri,'/'));
            return $regex;
        },
        ARRAY_FILTER_USE_KEY
    );
}

function params($uri, $matchedUri)
{
    if (!empty($matchedUri)) {
        $matchedToParams = array_keys($matchedUri)[0];
        return array_diff(
            explode('/',ltrim($uri, '/')),
            explode('/',ltrim($matchedToParams, '/'))
        );
    }
    return [];
}

function formatParams($uri, $params)
{
    $uri = explode('/', ltrim($uri,'/'));
    $paramsData = [];
    foreach ($params as $index => $param){
        $paramsData[$uri[$index - 1]] = $param;
    }

    return $paramsData;
}

function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $routes = routes();
    $matchedUri = exactMatchUriRoutes($uri,$routes);

    if (empty($matchedUri)) {
        $matchedUri = regularExpressionArrayRoutes($uri,$routes);
        $params = params($uri, $matchedUri);
        $params = params($uri,$params);
        var_dump($params);
        die();
    }



    var_dump($matchedUri);

}
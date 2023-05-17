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

    }
}

//8:30 parei na aula

function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $routes = routes();
    $matchedUri = exactMatchUriRoutes($uri,$routes);
    if (!empty($matchedUri)) {
        $matchedUri = regularExpressionArrayRoutes($uri,$routes);

    }

    var_dump($matchedUri);

}
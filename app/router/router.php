<?php

function routes()
{
    return require 'routes.php';
}

function exactMatchUriRoutes($uri, $routes)
{
    if (array_key_exists($uri,$routes)) {
        return [];
    } else {
       return [];

    }
}
function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $routes = routes();
    $matchedUri = exactMatchUriRoutes($uri,$routes);


}
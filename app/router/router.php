<?php

function routes()
{
    return require 'routes.php'; // arquivo separado para criar as rotas
}
function exactUrlInArrayRoutes($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        return [$uri => $routes[$uri]];
    }
    return [];
}

function exactUrlDinamicInArrayRoutes($uri, $routes)
{

    $matchUrl =  array_filter(
        $routes,
        function ($value) use ($uri) {
            $regex = str_replace("/", "\/", ltrim($value, '/'));
            return preg_match("/^$regex$/", ltrim($uri, "/"));
        },
        ARRAY_FILTER_USE_KEY
    );
    return $matchUrl;
}
function getParams($uri, $matchUri)
{
    if (!empty($matchUri)) {
        $explodeUri = explode("/", ltrim($uri, '/'));
        $matchUri = array_keys($matchUri)[0];
        $explodeMatchUri = explode("/", ltrim($matchUri, "/"));
        return array_diff($explodeUri, $explodeMatchUri);
    }
    return [];
}

function associateParamsKeys($uri, $params)
{

    $explodeUri = explode("/", ltrim($uri, '/'));
    $newParams = [];
    foreach ($params as $key => $value) {
        $newParams[$explodeUri[$key - 1]] = $value;
    }
    return $newParams;
}
function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $routes = routes();
    $params = [];
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $matchUri = exactUrlInArrayRoutes($uri, $routes[$requestMethod]);
    if (empty($matchUri)) {
        $matchUri =  exactUrlDinamicInArrayRoutes($uri, $routes[$requestMethod]);
        $params = getParams($uri, $matchUri);
        $params = associateParamsKeys($uri, $params);
    }
    if(!empty($matchUri)){
        return controller($matchUri, $params);
    }
    throw new Exception("ROTA NAO EXISTENTE NO SISTEMA");
}

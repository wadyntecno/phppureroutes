<?php
function routes()
{
  return require "routes.php";
}
function exactMatchUriInArrayRoutes($uri, $routes)
{
  if (array_key_exists($uri, $routes)) {
    return ['uri' => $routes[$uri]];
  }
  return [];
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

function paramsCompare($uri, $matchedUri)
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
  if (count($params) > 0) {
    foreach ($params as $index => $param) {
      $paramsData[$uri[$index - 1]] = $param;
    }
  }
  return $paramsData;
}

function router()
{
  $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $routes = routes();
  $matchedUri = exactMatchUriInArrayRoutes($uri, $routes);

  $params = [];
  if (empty($matchedUri)) {
    $matchedUri = regularExpressionMatchArrayRoutes($uri, $routes);
    $uri2 = explode('/', ltrim($uri, '/'));
    $params = paramsCompare($uri2, $matchedUri);
    $paramsData = paramsFormat($uri2, $params);
    var_dump($paramsData);
    // die();
  }

  if (!empty($matchedUri)) {
    controller($matchedUri, $params);
    return;
  }

  throw new Exception("Algo deu errado");

}

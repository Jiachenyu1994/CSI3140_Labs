<?php
require_once('_config.php');

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

// Serve the main HTML page
$app->get('/', function (Request $request, Response $response, $args) {
    $view = file_get_contents("{$GLOBALS["appDir"]}/views/index.html");
    $response->getBody()->write($view);
    return $response;
});

// API endpoint for rolling the die
$app->get('/api/roll', function (Request $request, Response $response, $args) {
    $dice = new \app\yatzy\Dice();
    $result = ["value" => $dice->roll()];
    $response->getBody()->write(json_encode($result));
    return $response->withHeader('Content-Type', 'application/json');
});



$app->run();
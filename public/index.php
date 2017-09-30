<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require(DIRNAME(__FILE__) . '../../vendor/autoload.php');
require(DIRNAME(__FILE__) . '../../controller/class.toDoListController.php');

$app = new \Slim\App;

/**
 * All of the metrorail train API calls as well 
 * as some sample API calls
 */
$app->get('/', function (Request $request, Response $response) {
    
    $response->getBody()->write('Give me your location');

    return $response;
});

$app->get('/get-all-todo/{id}', function (Request $request, Response $response) {
	
	$userid = $request->getAttribute('id');
    $toDoListController = new toDoListController();
    $response = $toDoListController->getAllItems($userid);

    return $response;
});

$app->run();
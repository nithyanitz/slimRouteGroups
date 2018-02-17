<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

/*$app->get('/welcome[/{id}]',function (Request $request,Response $response,$args){
$response->getBody()->write($args);
return $response;

});*/

$app->group('/Products',function(){
	$this->get('/{productId:[0-9]+}',function($request,$response,$args){
		$this->logger->info("hello");
		$this->logger->info(json_encode($args));
		//$response = $response->getBody()->write(json_encode($args));
		//return $response;
	$productController = new productController($this->connection);	
	$result = $productController->fetchProducts($args);
	$response = $response->withJSON($result);
	return $response;

	});

	$this->post('',function($request,$response,$args){
		$args = $request->getParsedBody();
		$productController = new productController($this->connection);
		$result = $productController->insertProducts($args);
		$response = $response->withJSON($result);
		//$response = $response->getBody->write("post successful");
		return $response;
	});

	$this->put('/{productId:[0-9]+}',function($request,$response,$args){

	});
});



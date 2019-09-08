<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once '../vendor/autoload.php';

$loader = new FilesystemLoader('../templates');

$twig = new Environment($loader, [
	//'cache' => '../cache',
	'debug' => true,
]);

$app = AppFactory::create();

$app->addRoutingMiddleware();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response, $args) use ($twig) {
	$client = new GuzzleHttp\Client();
	$res = $client->request('GET', 'https://www.thecocktaildb.com/api/json/v1/1/filter.php?a=Alcoholic');
	$data = json_decode($res->getBody()->getContents(), true);

	$view = $twig->render('pages/index.twig', [
		'pageTitle' => 'Cocktails',
		'items' => array_map(function ($e) {
			return [
				'href' => "/cocktails/{$e['idDrink']}",
				'id' => $e['idDrink'],
				'thumb' => $e['strDrinkThumb'],
				'name' => $e['strDrink'],
				'likes' => random_int(0, 200),
			];
		}, $data['drinks'])
	]);

	$response->getBody()->write($view);

	return $response;
});

$app->get('/cocktails/{id}', function (Request $request, Response $response, $args) use ($twig) {
	$client = new GuzzleHttp\Client();
	$res = $client->request('GET', "https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i={$args['id']}");
	$data = json_decode($res->getBody()->getContents(), true);

	$view = $twig->render('pages/profile.twig', [
		'pageTitle' => $data['drinks']['strDrink'],
		'item' => array_map(function ($e) {
			return $e + [
				'href' => "/cocktails/{$e['idDrink']}",
				'id' => $e['idDrink'],
				'thumb' => $e['strDrinkThumb'],
				'name' => $e['strDrink'],
				'likes' => random_int(0, 200),
			];
		}, $data['drinks'])[0],
	]);

	$response->getBody()->write($view);

	return $response;
});

$app->run();
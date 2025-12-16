<?php

use App\Infrastructure\Http\Controller\v1\TestAction;
use App\Infrastructure\Http\Controller\v2\NewTestAction;
use App\Infrastructure\Http\Middleware\AddHeadersMiddleware;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use Slim\Views\Twig;

return function (App $app) {
    $app->get('/', function (\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'main.html.twig', [
            'hello' => 'Hello World!'
        ]);
    });

    $app->group('/api/v1/', function (RouteCollectorProxy $group) {
        $group->get('test', [TestAction::class, 'index']);
        $group->get('test/{id:[0-9]+}',  [TestAction::class, 'show']);
    });

    $app->group('/api/v2/', function (RouteCollectorProxy $group) {
        $group->get('test2', [NewTestAction::class, 'index']);
        $group->get('test2/{id:[0-9]+}',  [NewTestAction::class, 'show']);
    })->add(AddHeadersMiddleware::class);
};

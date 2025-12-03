<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controllers\v2;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class NewTestAction
{
    public function index(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $obj = ['test' => 'index'];
        $response->getBody()->write(json_encode($obj));

        return $response->withHeader('Content-Type', 'application/json');
    }

    public function show(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $res = ['test' => 'show_' . $args['id']];
        $response->getBody()->write(json_encode($res));

        return $response->withHeader('Content-Type', 'application/json');
    }
}

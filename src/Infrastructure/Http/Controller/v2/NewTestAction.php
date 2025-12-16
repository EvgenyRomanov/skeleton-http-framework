<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controller\v2;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/** @psalm-suppress UnusedClass */
final class NewTestAction
{
    /** @psalm-suppress UnusedParam */
    public function index(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $obj = ['test' => 'index'];
        /** @psalm-suppress PossiblyFalseArgument */
        $response->getBody()->write(json_encode($obj));

        return $response->withHeader('Content-Type', 'application/json');
    }

    /** @psalm-suppress UnusedParam */
    public function show(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        /** @psalm-suppress MixedOperand */
        $res = ['test' => 'show_' . $args['id']];
        /** @psalm-suppress PossiblyFalseArgument */
        $response->getBody()->write(json_encode($res));

        return $response->withHeader('Content-Type', 'application/json');
    }
}

<?php

declare(strict_types=1);

namespace Tests;

use Faker\Factory as Faker;
use Illuminate\Database\Capsule\Manager as DatabaseManager;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Slim\App;
use Slim\Psr7\Uri;
use Throwable;

abstract class BaseTestAbstract extends TestCase
{
    protected ?DatabaseManager $capsule = null;
    protected ?\Faker\Generator $faker = null;

    protected ?App $app = null;

    /**
     * @throws Throwable
     */
    protected function setUp(): void
    {
        $this->faker = Faker::create();
        $this->app = require __DIR__ . '/../bootstrap/bootstrap_web_app.php';
        $this->capsule = $this->app->getContainer()[DatabaseManager::class];

        $this->capsule->getConnection()->beginTransaction();
    }

    /**
     * @throws Throwable
     */
    protected function tearDown(): void
    {
        $this->capsule->getConnection()->rollback();
    }

    protected function createRequest(
        string $method,
        string $path,
        array $headers = ['HTTP_ACCEPT' => 'application/json'],
        array $cookies = [],
        array $serverParams = []
    ): \Psr\Http\Message\ServerRequestInterface {
        $uri = new Uri('', '', 80, $path);
        $handle = fopen('php://temp', 'w+');
        $stream = (new \Slim\Psr7\Factory\StreamFactory())->createStreamFromResource($handle);

        $h = new \Slim\Psr7\Headers();
        foreach ($headers as $name => $value) {
            $h->addHeader($name, $value);
        }

        return new \Slim\Psr7\Request($method, $uri, $h, $cookies, $serverParams, $stream);
    }

    protected function parseResponse(ResponseInterface $response)
    {
        return json_decode((string) $response->getBody(), true);
    }
}

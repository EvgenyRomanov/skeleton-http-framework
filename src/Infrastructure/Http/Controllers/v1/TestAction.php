<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controllers\v1;

use App\Infrastructure\Events\ExampleEvent;
use App\Infrastructure\Jobs\ExampleJob;
use App\Infrastructure\Jobs\ExampleJob2;
use App\Infrastructure\Jobs\ExampleJob3;
use App\Infrastructure\Models\User;
use Illuminate\Contracts\Bus\Dispatcher;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final readonly class TestAction
{
    public function __construct(
        private ResponseFactoryInterface                $responseFactory,
        private \Illuminate\Database\Capsule\Manager    $capsule,
        private Dispatcher                              $jobDispatcher,
        private \Illuminate\Contracts\Events\Dispatcher $eventDispatcher
    ) {}

    public function index(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        // ---------------- DB --------------------------
        User::factory()->create();

        dump(User::all());
        dump(\Illuminate\Database\Capsule\Manager::table('users')->select("*")->get());
        dump($this->capsule->getDatabaseManager()->query()->from('users')->count());

        // ---------------- Jobs -------------------------
        \Illuminate\Queue\Capsule\Manager::pushOn('default', new ExampleJob2(['message' => 3]));
        $this->jobDispatcher->dispatch(new ExampleJob(['message' => 1]));
        \Illuminate\Queue\Capsule\Manager::pushOn('queue2', new ExampleJob(['message' => 2]));
        $this->jobDispatcher->dispatch(new ExampleJob3(['message' => 3]));

        // ---------------- Events ------------------------
        $this->eventDispatcher->dispatch(new ExampleEvent('1q2w3e'));

        $response = $this->responseFactory->createResponse();
        $response->getBody()->write(json_encode([1, 2, 3, 4, 5]));

        return $response->withHeader('Content-Type', 'application/json');
    }

    public function show(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $res = ['test' => 'show_' . $args['id']];
        $response->getBody()->write(json_encode($res));

        return $response->withHeader('Content-Type', 'application/json');
    }
}

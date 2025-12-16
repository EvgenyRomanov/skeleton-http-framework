<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controller\v1;

use App\Infrastructure\Event\ExampleEvent;
use App\Infrastructure\Job\ExampleJob;
use App\Infrastructure\Job\ExampleJob2;
use App\Infrastructure\Job\ExampleJob3;
use App\Infrastructure\Model\User;
use Illuminate\Contracts\Bus\Dispatcher;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/** @psalm-suppress UnusedClass */
final readonly class TestAction
{
    public function __construct(
        private ResponseFactoryInterface                $responseFactory,
        private \Illuminate\Database\Capsule\Manager    $capsule,
        private Dispatcher                              $jobDispatcher,
        private \Illuminate\Contracts\Events\Dispatcher $eventDispatcher
    ) {}

    /** @psalm-suppress UnusedParam */
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
        /** @psalm-suppress PossiblyFalseArgument */
        $response->getBody()->write(json_encode([1, 2, 3, 4, 5]));

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

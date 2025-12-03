<?php

use Illuminate\Container\Container;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Queue\Capsule\Manager;
use Illuminate\Queue\Worker;
use Psr\Log\LoggerInterface;

/** @see QueueServiceProvider */
return function (Container $container): Worker {
    $manager = $container[Manager::class];
  $dispatcher = $container[Dispatcher::class];
  $logger = $container[LoggerInterface::class];
  $isDownForMaintenanceHandler = function () {};
  $handler = new class($logger) implements ExceptionHandler {
      private LoggerInterface $logger;

      public function __construct(LoggerInterface $logger)
      {
          $this->logger = $logger;
      }
      public function report(Throwable $e)
      {
          echo $e->getMessage() . PHP_EOL;
          $this->logger->error($e->getMessage(), ['Exception' => $e]);
      }

      public function shouldReport(Throwable $e) {}
      public function render($request, Throwable $e) {}
      public function renderForConsole($output, Throwable $e) {}
  };

  return new Worker(
      $manager->getQueueManager(),
      $dispatcher,
      $handler,
      $isDownForMaintenanceHandler
  );
};

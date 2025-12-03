<?php

use Dotenv\Dotenv;
use Illuminate\Container\Container;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';

// Загрузка переменных из .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$container = Container::getInstance();

// Настройка DI-контейнера
(require __DIR__ . '/di_container.php')($container);

// Создание web приложения
$app = AppFactory::createFromContainer($container);

// Регистрация маршрутов
(require __DIR__ . '/routes.php')($app);

// Регистрация middleware
(require __DIR__ . '/middleware.php')($app, $container);

return $app;

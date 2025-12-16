# 🧩🏗️ PHP skeleton http framework

## 📝 Описание
Представляет собой скелет типового HTTP-проекта на PHP.  

В проекте собраны и настроены следующие модули:
 - Компоненты из экосистемы Slim (HTTP-ядро)
    - HTTP-ядро (`slim/psr7`, `slim/slim`, `slim/twig-view`)
 - Компоненты из экосистемы Laravel
    - ORM Eloquent (`illuminate/database`)
    - DI-контейнер (`illuminate/container`)
    - Диспетчер событий (`illuminate/events`)
    - Обработчик заданий (`illuminate/queue`)
 - Компоненты из экосистемы Symfony
    - Система миграций (`doctrine/migrations`)
    - Кэш (`symfony/cache`)
    - Консольные команды (`symfony/console`)
 - Компоненты из экосистемы Laminas
    - Конфиг-агрегатор (`laminas/laminas-config-aggregator`)
 - Компоненты для тестирования и статического анализа и др.

## 📑 Особенности
- 🐳 Готовое окружение — Docker-контейнеры для быстрого запуска
- ⚙️ Удобное управление — Makefile с предустановленными командами
- ▶️ Примеры использования компонент
- 🔧 Базовая конфигурация

# 📚 Documentation

## Slim
- https://www.slimframework.com/
- https://php.dragomano.ru/slim-4-kratkiy-kurs/
- https://github.com/odan/slim4-skeleton
- https://github.com/odan/slim4-tutorial?tab=readme-ov-file
## ORM, Database
- https://laravel.com/docs/12.x/eloquent
- https://laravel.com/docs/12.x/database
- https://laravel.su/docs/12.x/database
- https://laravel.su/docs/12.x/eloquent
- https://github.com/hexlet-components/php-eloquent-blog
## VarDumper
- https://symfony.com/doc/current/components/var_dumper.html
## IoC
- https://laravel.su/docs/12.x/container
- https://habr.com/ru/articles/331982/
## Queue, Jobs, Workers
- https://laravel.su/docs/12.x/queues
- https://laravel.com/docs/12.x/queues
- https://github.com/illuminate/queue
## Migrations
- https://www.doctrine-project.org/projects/doctrine-migrations/en/3.9/reference/introduction.html
## Console Commands
- https://dev.to/robertobutti/building-a-command-line-tool-with-php-and-symfony-console-4n6g
- https://odan.github.io/slim4-skeleton/console.html
- https://php.zone/symfony-course/znakomstvo-s-konsolnymi-komandami-v-symfony-cron
- https://symfony.com/doc/current/components/console.html
## Cache
https://symfony.com/doc/7.3/cache.html

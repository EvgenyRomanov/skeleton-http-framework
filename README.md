# General
Slim - обработка http-запросов, ядро проекта.

Illuminate/container - IoC-контейнер с зависимостями

ORM - Eloquent


---
# Documentation

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
- https://laravel.su/docs/8.x/container
- https://habr.com/ru/articles/331982/
## Queue, Jobs, Workers
- https://laravel.su/docs/12.x/queues
- https://laravel.com/docs/12.x/queues
- https://github.com/illuminate/queue

---
## Migrations
- https://www.doctrine-project.org/projects/doctrine-migrations/en/3.9/reference/introduction.html

Консольные команды
```shell
php bin/console.php 
```
---

## Console Commands
- https://dev.to/robertobutti/building-a-command-line-tool-with-php-and-symfony-console-4n6g
- https://odan.github.io/slim4-skeleton/console.html
- https://php.zone/symfony-course/znakomstvo-s-konsolnymi-komandami-v-symfony-cron
- https://symfony.com/doc/current/components/console.html

Команды регистрируются в `config/console_commands/`

---
## Events, Listeners
Подписка на события `config/event_listener_mappings/`

---
## Worker
Example:
```shell
php bin/console.php worker:run --rest=3 default test_queue_name,default
```

---
## Cache
`\Symfony\Component\Cache\Adapter\PdoAdapter`
https://symfony.com/doc/7.x/cache.html

---
## Tests

```shell
php ./vendor/bin/phpunit tests
```

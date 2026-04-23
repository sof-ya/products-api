# Products API
Список товаров с поиском, сортировкой, фильтрацией и пагинацией. Для того, чтобы получить список товаров, необходимо авторизоваться.

## Первый запуск
1. Создание .env файла `cp .env.example .env`
2. Генерация каталога vendor `composer install`
3. Запуск сервера `vendor/bin/sail up -d`
>Для того, чтобы выполнять запуск с помощью sail, необходимо в файл .bashrc (Находится в корневой директории пользователя) добавить alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'. Либо запускать через ./vendor/bin/sail

4. Запуск миграций я засеиванием БД `sail artisan migrate --seed`
5. Индексация моделей для ElasticSearch `sail artisan search:reindex`
6. Генерация ключа JWT `sail artisan jwt:secret`
7. Генерация ключа приложения `sail artisan key:generate`

Документация на эндпоинте /api/documentation 
# 1 шаг
<code>composer install</code> - скачиваем зависимости

# 2 шаг
<code>./vendor/bin/sail up -d</code> - разворачиваем проект

# 3 шаг
<code>docker exec -it laravel-api-laravel.test-1 sh</code> - заходим в контейнер

# 4 шаг
<code>php artisan migrate</code> - выполняем миграцию БД

# 5 шаг
<code>php artisan db:seed</code> - создает 100 фейковых сотрудников

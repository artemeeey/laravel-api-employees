# 1 шаг
<code>./vendor/bin/sail up -d</code> - разворачиваем проект

# 2 шаг
<code>docker exec -it laravel-api-laravel.test-1 sh</code> - заходим в контейнер

# 3 шаг
<code>php artisan migrate</code> - выполняем миграцию БД

# 4 шаг
<code>php artisan db:seed</code> - создает 100 фейковых сотрудников

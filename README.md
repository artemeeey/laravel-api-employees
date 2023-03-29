# 1 шаг
./vendor/bin/sail up -d

# 2 шаг
docker exec -it laravel-api-laravel.test-1 sh

# 3 шаг
php artisan migrate

# 4 шаг
php artisan db:seed

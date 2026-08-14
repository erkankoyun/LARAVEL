#!/bin/sh
set -e

cd /var/www/html

if [ ! -f .env ]; then
    cp .env.example .env
fi

if ! grep -q '^APP_KEY=base64:' .env; then
    php artisan key:generate --force
fi

mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs database
touch database/database.sqlite

php artisan migrate --force

exec php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"

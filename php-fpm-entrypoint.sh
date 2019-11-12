#!/usr/bin/env bash
set -e

composer install

cat .env
./artisan optimize:clear
./artisan migrate --no-interaction --force

echo "Running php-fpm"
php-fpm

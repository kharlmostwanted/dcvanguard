#!/bin/bash

# This is a comment
git pull
composer install --optimize-autoloader --no-dev
php artisan migrate --force
php artisan route:clear
php artisan event:clear
php artisan view:clear
php artisan cache:clear
php artisan config:clear
php artisan up
php artisan db:seed --force



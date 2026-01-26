#!/bin/sh

cd /var/www/html

/usr/local/bin/php artisan migrate --force

exec apache2-foreground

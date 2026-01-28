FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev libxml2-dev zip curl libpq-dev

RUN docker-php-ext-install \
    pdo pdo_mysql pdo_pgsql pgsql \
    mbstring zip exif pcntl bcmath gd

RUN a2enmod rewrite

WORKDIR /var/www/html
COPY . .

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

RUN mkdir -p public/build \
 && chown -R www-data:www-data storage bootstrap/cache public/build \
 && chmod -R 775 storage bootstrap/cache

RUN sed -i 's|/var/www/html|/var/www/html/public|g' \
    /etc/apache2/sites-available/000-default.conf

RUN php artisan config:clear \
 && php artisan route:clear \
 && php artisan view:clear

# Increase PHP upload limits
RUN echo "upload_max_filesize=20M" > /usr/local/etc/php/conf.d/uploads.ini \
&& echo "post_max_size=25M" >> /usr/local/etc/php/conf.d/uploads.ini \
&& echo "memory_limit=256M" >> /usr/local/etc/php/conf.d/uploads.ini


EXPOSE 80
CMD ["apache2-foreground"]

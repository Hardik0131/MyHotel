# ---------- FRONTEND BUILD ----------
FROM node:20-alpine AS frontend

WORKDIR /app

# Copy package files
COPY package*.json ./
RUN npm install

# Copy resources & config
COPY resources resources
COPY vite.config.js .

# 🔴 FIX: create public directory BEFORE build
RUN mkdir -p public

# Build assets
RUN npm run build


# ---------- BACKEND ----------
FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev libxml2-dev zip curl

RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath gd
RUN a2enmod rewrite

WORKDIR /var/www/html
COPY . .

# copy built assets from frontend stage
COPY --from=frontend /app/public/build public/build

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data storage bootstrap/cache public/build \
    && chmod -R 775 storage bootstrap/cache

RUN sed -i 's|/var/www/html|/var/www/html/public|g' \
    /etc/apache2/sites-available/000-default.conf

EXPOSE 80
CMD ["apache2-foreground"]

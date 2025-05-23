FROM php:8.2-fpm

# Instala Node.js 18.x LTS + dependências PHP
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get update && apt-get install -y \
    nodejs \
    libzip-dev zip unzip curl git libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql zip mbstring xml

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

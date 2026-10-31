FROM php:8.3-apache

# PHP-расширения для Laravel и MySQL, mod_rewrite для красивых URL
RUN apt-get update && apt-get install -y --no-install-recommends git unzip libzip-dev \
    && docker-php-ext-install pdo_mysql zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

# Корень сайта в Laravel это папка public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1

# Apache работает под uid 1000, как твой пользователь в Ubuntu, чтобы не было проблем с правами
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

WORKDIR /var/www/html
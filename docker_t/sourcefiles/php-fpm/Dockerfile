FROM php:8.2-fpm

WORKDIR /application

# Общие утилиты + Composer
RUN apt-get update \
 && apt-get install -y --no-install-recommends \
        libzip-dev zip libicu-dev \
        nano curl git \
 && curl -sS https://getcomposer.org/installer \
        | php -- --install-dir=/usr/local/bin --filename=composer

# PHP-расширения
# zip  + intl
RUN docker-php-ext-install zip \
 && docker-php-ext-configure intl \
 && docker-php-ext-install intl

# MySQL-расширение (pdo_mysql)
RUN docker-php-ext-install pdo_mysql

# gd
RUN apt-get install -y --no-install-recommends \
        libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
 && docker-php-ext-configure gd \
        --with-freetype=/usr/include/ \
        --with-jpeg=/usr/include/ \
 && docker-php-ext-install gd

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

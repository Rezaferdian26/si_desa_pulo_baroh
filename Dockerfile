FROM php:7.4-fpm

WORKDIR /code
RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update -y && apt-get install -y sendmail libpng-dev libzip-dev

RUN apt-get update && \
    apt-get install -y \
    zlib1g-dev 

# RUN docker-php-ext-install mbstring

RUN docker-php-ext-install zip

RUN docker-php-ext-install gd

# Install Composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

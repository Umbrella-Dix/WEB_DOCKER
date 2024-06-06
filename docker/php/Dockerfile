# FROM php:8.0-apache
# WORKDIR /var/www/html
# # COPY ./src ./
# # COPY ./css ./
# # COPY ./img ./
# RUN apt-get update -y && apt-get install -y libmariadb-dev
# RUN docker-php-ext-install pdo_mysql




FROM php:8.1-fpm

# FROM php:8.0-apache

RUN docker-php-ext-install mysqli

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY conf.d/* $PHP_INI_DIR/conf.d/


RUN groupadd -g 1001 myuser && \
    useradd -u 1001 -g 1001 -s /bin/bash -m myuser && \
    usermod -aG sudo myuser && \
    echo 'myuser:mypass' | chpasswd

RUN apt-get update
RUN apt-get install -y curl git && apt-get install -y libmariadb-dev

RUN docker-php-ext-install mysqli pdo pdo_mysql

USER myuser
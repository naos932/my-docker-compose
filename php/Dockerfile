FROM php:8.1-fpm-alpine

# RUN apk update && apk add --no-cache freetype-dev libjpeg-dev libpng-dev libwebp-dev

# alpine 新版本 使用 --no-cache 则自动 apk update，所以这里不需要 apk update
RUN apk add --no-cache \
        libjpeg-turbo-dev \
        libpng-dev \
        libwebp-dev \
        freetype-dev

RUN docker-php-ext-configure gd --with-jpeg --with-webp --with-freetype
RUN docker-php-ext-install gd

RUN docker-php-ext-install pdo pdo_mysql mysqli

ENV COMPOSER_ALLOW_SUPERUSER=1

COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer

#    ./app/composer.* /var/www/html/
COPY ./app/composer.* ./

RUN composer install --prefer-dist --no-scripts --no-progress --no-interaction

COPY ./app .

RUN composer dump-autoload --optimize
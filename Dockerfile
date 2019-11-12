FROM composer:1.9 AS composer

COPY composer.* ./
RUN composer global require hirak/prestissimo
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-scripts \
    --prefer-dist

FROM php:7.3-fpm

ENV TZ=Europe/Moscow

RUN apt update && \
    apt install -y --no-install-recommends --no-install-suggests unzip git libzip-dev libpq-dev zlib1g-dev libxml2-dev libpng-dev gnupg2 && \
    docker-php-ext-install zip pdo pdo_mysql gd

RUN if [ "${http_proxy}" != "" ]; then \
        pear config-set http_proxy ${http_proxy}; \
    fi

RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

RUN pecl install xdebug && \
    docker-php-ext-enable xdebug

WORKDIR /app

COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY --chown=www-data:www-data . /app
COPY --chown=www-data:www-data --from=composer /app/vendor/ /app/vendor/
COPY ./custom.ini /usr/local/etc/php/conf.d

ENTRYPOINT ["/bin/bash","/app/php-fpm-entrypoint.sh"]

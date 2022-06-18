FROM php:8.1-fpm-alpine3.14 AS php

WORKDIR /app

ENV COMPOSER_HOME /var/.composer

COPY --from=composer:2.3 /usr/bin/composer /usr/bin/composer

RUN apk add --update \
        git \
        icu \
        libzip \
        postgresql-libs \
    && \
    apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        curl \
        g++ \
        gcc \
        icu-dev \
        libzip-dev \
        make \
        perl \
        postgresql-dev \
    && \
    pecl install ds pcov xdebug && \
    docker-php-ext-configure intl  && \
    docker-php-ext-install intl pdo pdo_pgsql && \
    docker-php-ext-enable ds pcov xdebug && \
    apk del --purge .build-deps

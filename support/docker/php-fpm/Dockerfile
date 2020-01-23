FROM php:7.3.13-fpm-stretch
ARG TIMEZONE

# Set timezone
RUN ln -snf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime && echo ${TIMEZONE} > /etc/timezone \
    && printf '[PHP]\ndate.timezone = "%s"\n', ${TIMEZONE} > /usr/local/etc/php/conf.d/tzone.ini \
    && date

RUN apt-get update && apt-get install -y \
        apt-utils \
        libzip-dev\
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        locales \
        locales-all \
        zip \
        unzip \
        wget \
        libxml2-dev \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install zip soap \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# set correct locale
RUN { \
        echo 'en_US.UTF-8 UTF-8'; \
        echo 'ru_RU ISO-8859-5'; \
        echo 'ru_RU.CP1251 CP1251'; \
        echo 'ru_RU.KOI8-R KOI8-R'; \
        echo 'ru_RU.UTF-8 UTF-8'; \
    } > /etc/locale.gen && \
    locale-gen

ENV LANG=en_US.UTF-8 \
    LC_ALL=en_US.UTF-8 \
    LANGUAGE=en_US.UTF-8

COPY php.ini /usr/local/etc/php/php.ini

RUN apt-get clean && rm -rf /tmp/* && \
    curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer

ADD xdebug.ini /usr/local/etc/php/conf.d/

ADD symfony.pool.conf /usr/local/etc/php/php-fpm.d/

RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
    locale-gen

WORKDIR /var/www/app
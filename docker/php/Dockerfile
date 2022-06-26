FROM composer:latest AS composer
FROM php:8.1-fpm

ENV PHPREDIS_VERSION 5.3.7
ENV COMPOSER_HOME $HOME/.config/composer
ENV COMPOSER_CACHE_DIR $HOME/.cache/composer

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN rm -f /etc/localtime \
    && ln -sf /usr/share/zoneinfo/Asia/Almaty /etc/localtime \
    && echo 'Asia/Almaty' > /etc/timezone

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod uga+x /usr/local/bin/install-php-extensions \
    && sync \
    && install-php-extensions gd intl soap zip bcmath xmlrpc pcntl pdo_pgsql pgsql

RUN mkdir -p /usr/src/php/ext/redis \
    && curl -L https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz | tar xvz -C /usr/src/php/ext/redis --strip 1 \
    && echo 'redis' >> /usr/src/php-available-exts \
    && docker-php-ext-install redis

RUN cd /var/www && rm -r html

COPY . /var/www

COPY --chown=www-data:www-data . /var/www



EXPOSE 9000
CMD ["php-fpm"]

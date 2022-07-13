FROM php:8.1-fpm-alpine

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod uga+x /usr/local/bin/install-php-extensions \
    && install-php-extensions \
        @composer \
        bcmath \
        exif \
        gd \
        intl \
        pcntl \
        pdo_pgsql \
        redis \
        soap \
        pgsql \
        xmlrpc \
        zip

RUN rm -f /etc/localtime \
    && ln -sf /usr/share/zoneinfo/Asia/Almaty /etc/localtime \
    && echo 'Asia/Almaty' > /etc/timezone

EXPOSE 9000
CMD ["php-fpm"]

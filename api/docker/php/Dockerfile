# php-fpm
FROM php:7.2.0-fpm

CMD ["php-fpm"]

EXPOSE 9000

RUN docker-php-ext-install pdo_mysql
RUN pecl install apcu-5.1.8

RUN apt-get update && \
apt-get install -y \
zlib1g-dev

RUN docker-php-ext-install zip
RUN docker-php-ext-enable apcu

# Allow Composer to be run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin \
&& ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

WORKDIR /srv/api

COPY . /srv/api

RUN chown www-data -R /srv/api

RUN PATH=$PATH:/srv/api/vendor/bin:bin













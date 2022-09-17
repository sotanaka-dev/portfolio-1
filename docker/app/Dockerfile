FROM php:apache

WORKDIR /var/www/html

COPY php.ini /usr/local/etc/php/
COPY 000-default.conf /etc/apache2/sites-enabled/

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apt-get update \
&& apt-get install -y \
git \
zip \
unzip \
vim \
libpng-dev \
libpq-dev \
&& docker-php-ext-install pdo_mysql

RUN apt-get install -y nodejs npm && npm install n -g && n latest

RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
RUN /bin/sh -c a2enmod rewrite

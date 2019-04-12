FROM php:7.2-apache

RUN a2enmod ssl \
    && a2enmod rewrite \
    && service apache2 restart

#setup host name for apache
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN apt-get update && apt-get install -y gnupg2 apt-transport-https

RUN apt-get update  \
    && apt-get -y upgrade \
    && apt-get install -y zlib1g-dev libicu-dev libpng-dev g++ \
    && apt-get install -y libc-client-dev libkrb5-dev \
    && rm -r /var/lib/apt/lists/*

RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-install gd \
    && docker-php-ext-install zip
#    && docker-php-ext-configure pdo_pgsql -with-pgsql=/usr/local/pgsql \
#    && docker-php-ext-install pdo pdo_pgsql

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-configure pdo_pgsql -with-pgsql=/usr/local/pgsql && docker-php-ext-install pdo_pgsql

WORKDIR /var/www/html
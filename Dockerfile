FROM php:8.2-apache

# install dependency and extension php
RUN apt-get update && apt-get install -y \
  git unzip libzip-dev libpq-dev liboing-dev \
  && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip mbstring

# enabled mod_rewrite apache
RUN a2enmod rewrite

# copy code project
COPY . /var/www/html

# Establishing rights
RUN chown -R www-data:www-data /var/www/html
FROM php:8.2-apache

# install dependency and extension php
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpq-dev \
    libpng-dev \
    libonig-dev \
    zlib1g-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip mbstring \
    && apt-get clean && rm -rf /var/lib/apt/lists/*
    
# enabled mod_rewrite apache
RUN a2enmod rewrite

# Change DocumentRoot to public
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
    && sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf

# copy code project
COPY . /var/www/html

# Establishing rights
RUN chown -R www-data:www-data /var/www/html
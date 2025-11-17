# Base image PHP 8.4 + Apache
FROM php:8.4-apache

RUN a2enmod rewrite

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

WORKDIR /var/www/html

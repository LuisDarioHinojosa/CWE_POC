FROM php:7.1-apache

RUN docker-php-ext-install pdo pdo_mysql

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
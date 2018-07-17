# Dockerfile
FROM php:7.2-apache



MAINTAINER Raphael Mäder <me@randm.ch>

RUN a2enmod rewrite
RUN docker-php-ext-install pdo pdo_mysql

ADD . /var/www/html
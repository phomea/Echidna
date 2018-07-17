# Dockerfile
FROM php:7.2-apache



MAINTAINER Raphael Mäder <me@randm.ch>

RUN a2enmod rewrite

#install some base extensions
RUN apt-get update && apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-configure zip --with-libzip \
  && docker-php-ext-install zip

RUN docker-php-ext-install pdo pdo_mysql


ADD ./app /var/www/html

WORKDIR /var/www/html

# Allow Composer to be run as root
#ENV COMPOSER_ALLOW_SUPERUSER 1

# Setup the Composer installer
#RUN curl -o /tmp/composer-setup.php https://getcomposer.org/installer \
#  && curl -o /tmp/composer-setup.sig https://composer.github.io/installer.sig \
#  && php -r "if (hash('SHA384', file_get_contents('/tmp/composer-setup.php')) !== trim(file_get_contents('/tmp/composer-setup.sig'))) { unlink('/tmp/composer-setup.php'); echo 'Invalid installer' . PHP_EOL; exit(1); }" \
#  && php /tmp/composer-setup.php \
#  && chmod a+x composer.phar \
#  && mv composer.phar /usr/local/bin/composer \
#  && echo pwd: `pwd` && echo ls: `ls` \
#  && composer install

# Dockerfile
FROM php:7.2-apache



MAINTAINER Raphael Mäder <me@randm.ch>

RUN a2enmod rewrite
RUN a2enmod headers

#install some base extensions
RUN apt-get update && apt-get install -y \
        libzip-dev \
        zip \
        libpng-dev \
        zlib1g-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
  && docker-php-ext-configure zip --with-libzip \
  && docker-php-ext-install zip

RUN curl -sSL https://get.docker.com/ | sh

RUN docker-php-ext-install pdo pdo_mysql

#RUN docker-php-ext-install gd

#RUN docker-php-ext-enable gd

#RUN docker-php-ext-configure gd



RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install -j$(nproc) gd

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

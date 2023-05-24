FROM php:8.2.6-fpm-alpine

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /app
WORKDIR /app

RUN composer install --prefer-source --no-interaction
RUN composer dump-autoload -o

ENV PATH="~/.composer/vendor/bin:./vendor/bin:${PATH}"

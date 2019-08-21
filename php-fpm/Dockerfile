FROM composer:latest AS composer
FROM php:fpm-alpine
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer --version && php --v
RUN docker-php-ext-install pdo_mysql
RUN apk add --no-cache bash
CMD ["php-fpm"]
EXPOSE 9000
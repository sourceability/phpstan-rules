FROM php:7.3-alpine

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN composer global require hirak/prestissimo && composer clearcache

RUN apk add --no-cache make git

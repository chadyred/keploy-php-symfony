FROM php:8.3.11-fpm-alpine3.20@sha256:421373ae5f16b3afa03506de0ecbb4dcf39e4fe817b2a40b5f5c1f23c041dffa

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev git

RUN docker-php-ext-install pdo pdo_pgsql pgsql
RUN apk add --no-cache bash && curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash && apk add symfony-cli

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
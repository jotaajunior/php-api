FROM php:8.0.5-fpm-alpine

RUN apk add --no-cache nginx wget
RUN docker-php-ext-install pdo pdo_mysql

RUN mkdir -p /run/nginx
COPY ./docker/nginx.conf /etc/nginx/nginx.conf

RUN mkdir -p /src
COPY ./src /src

RUN mkdir -p /docker
COPY ./docker/startup.sh /src/startup.sh

RUN sh -c "wget http://getcomposer.org/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/local/bin/composer"
RUN cd /src && /usr/local/bin/composer install --no-dev

RUN chmod +x /src/startup.sh
ENTRYPOINT ["/src/startup.sh"]
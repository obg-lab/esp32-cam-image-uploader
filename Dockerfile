FROM alpine:3.7

ENV PORT 8000

RUN apk --no-cache add \
    php7 \
    php7-fpm \
    php7-pdo \
    php7-mbstring \
    php7-xml \
    php7-openssl \
    php7-json \
    php7-phar \
    php7-zip \
    php7-dom \
    php7-session \
    php7-zlib && \
    php7 -r "copy('http://getcomposer.org/installer', 'composer-setup.php');" && \
    php7 composer-setup.php --install-dir=/usr/bin --filename=composer && \
    php7 -r "unlink('composer-setup.php');" && \
    ln -sf /usr/bin/php7 /usr/bin/php && \
    ln -s /etc/php7/php.ini /etc/php7/conf.d/php.ini

RUN set -x \
    addgroup -g 82 -S www-data \
    adduser -u 82 -D -S -G www-data www-data

COPY . /app

ADD .env.example /app/.env

WORKDIR /app

RUN chmod -R 777 storage

EXPOSE 8000

CMD php -S 0.0.0.0:${PORT} -t public

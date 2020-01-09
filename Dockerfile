FROM php:7.2-fpm-alpine

# lumen packages
RUN docker-php-ext-install mbstring tokenizer mysqli pdo_mysql

ENV PORT 8000

RUN php -r "copy('http://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"

COPY . /app

ADD .env.example /app/.env

WORKDIR /app

RUN mkdir -p /app/public/uploads && \
    chmod -R 775 /app/storage && \
    chmod -R 775 /app/public/uploads

EXPOSE 8000

CMD php -S 0.0.0.0:${PORT} -t public

FROM php:7.4.33-cli
WORKDIR /app
RUN curl -sLS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer && \
    apt-get update && \
    apt-get install -y libzip-dev && \
    pecl install xdebug-3.1.6 && \
    pecl install zip && \
    docker-php-ext-enable xdebug && \
    echo "extension=zip.so" >> /usr/local/etc/php/php.ini && \
    echo "xdebug.mode=coverage" >> /usr/local/etc/php/php.ini
COPY . .
FROM php:7.4

RUN apt update && \
    apt install -y libpq-dev\
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        graphviz \
        curl \
        git\
        wget \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-ext-install sockets \
    && docker-php-source delete 

RUN docker-php-ext-configure pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# RUN apt install -y  curl -sS https://getcomposer.org/installer | php \
# RUN chmod +x composer.phar && mv composer.phar /usr/local/bin/composer

WORKDIR /php

RUN composer --version
RUN php --version
RUN git --version


# Remove Cache
RUN rm -rf /var/cache/*

# ENTRYPOINT ["php"]

# CMD ["--version"] 

#FROM php:7.0.22-fpm
FROM php:7.3.28-fpm

RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get -y install nodejs

RUN apt-get update && apt-get install -y \
    curl \
    wget \
    git \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libxslt-dev \
    libicu-dev \
    libmcrypt-dev \
    libzip-dev \
    libpng-dev \
    libxml2-dev


RUN pecl install mcrypt-1.0.3 \
    && docker-php-ext-enable mcrypt

RUN docker-php-ext-install iconv
RUN docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-install gd/
RUN docker-php-ext-install pdo_mysql/
RUN docker-php-ext-install zip/
RUN docker-php-ext-install mysqli/
#RUN docker-php-ext-install mbstring/

RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl
RUN docker-php-ext-install xsl
RUN docker-php-ext-install soap
RUN docker-php-ext-install calendar
RUN docker-php-ext-install exif
RUN docker-php-ext-install pcntl

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD /docker/php/php.ini /usr/local/etc/php/conf.d/40-custom.ini

WORKDIR /usr/src/app

CMD ["php-fpm"]

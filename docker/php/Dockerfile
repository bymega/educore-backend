FROM php:8.3.0-fpm

ARG user=1000
ARG uid=1000

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    autoconf \
    g++ \
    make \
    && pecl install xdebug redis \
    && docker-php-ext-enable xdebug redis \
    && apt-get clean && rm -rf /var/lib/apt/lists/*


#copy xdebug
COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
COPY php.ini /usr/local/etc/php/conf.d/custom.ini


# Add the script for installing PHP extensions
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/install-php-extensions

# Install PHP extensions: gd, mysql, zip
RUN install-php-extensions gd pdo_mysql zip mysqli

# Install additional PHP extensions
RUN docker-php-ext-install mbstring exif pcntl bcmath

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN useradd -G www-data,root -u $uid -d /home/$user $user \
    && mkdir -p /home/$user/.composer \
    && chown -R $user:$user /home/$user

RUN chown -R $user:$user /var/www/html/

WORKDIR /var/www/html
COPY . .

RUN chmod -R 777 /var/www/html/

EXPOSE 9000

CMD ["php-fpm"]

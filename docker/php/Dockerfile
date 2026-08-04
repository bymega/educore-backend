FROM php:8.5-fpm

ARG user=appuser
ARG uid=1000
ARG gid=1000

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

RUN if ! getent group "$gid" >/dev/null; then groupadd --gid "$gid" "$user"; fi \
    && useradd --non-unique --uid "$uid" --gid "$gid" --groups www-data,root \
        --create-home --home-dir "/home/$user" "$user" \
    && mkdir -p "/home/$user/.composer" \
    && chown -R "$uid:$gid" "/home/$user"

WORKDIR /var/www/html

EXPOSE 9000

CMD ["php-fpm"]

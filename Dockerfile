# Gunakan image PHP 8.3 dengan FPM dan Alpine sebagai base image
FROM php:8.3-fpm-alpine

# Set working directory
WORKDIR /var/www

# Install dependensi sistem yang diperlukan
RUN apk add --no-cache \
    bash \
    zip \
    unzip \
    git \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    oniguruma-dev \
    nodejs \
    npm \
    mariadb-client \
    icu-dev \
    libzip-dev \
    supervisor

# Install ekstensi PHP yang dibutuhkan Laravel
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql mbstring exif pcntl bcmath zip intl

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy aplikasi Laravel ke dalam container
COPY . .

# Berikan izin untuk storage dan bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# Install dependensi Laravel
RUN composer install --no-dev --optimize-autoloader

# Expose port 9000 (PHP-FPM)
EXPOSE 9000

# Jalankan PHP-FPM
CMD ["php-fpm"]

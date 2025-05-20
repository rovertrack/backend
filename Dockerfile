# FROM php:8.2-fpm

# # Upgrade system packages to reduce vulnerabilities
# RUN apt-get update && apt-get upgrade -y && apt-get install -y \
#     zip unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev \
#     && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl \
#     && apt-get clean && rm -rf /var/lib/apt/lists/*

# # Install PHP extensions and tools
# RUN apt-get update && apt-get install -y \
#     zip unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev \
#     && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl

# # Install Composer
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# # Set working directory inside container
# WORKDIR /var/www

# # Copy Laravel project into container
# COPY . .

# # Install dependencies
# RUN composer install

# # Set permissions
# RUN chown -R www-data:www-data /var/www \
#     && chmod -R 755 /var/www/storage

# EXPOSE 9000
# CMD ["php-fpm"]
# Use the official PHP image with FPM
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    nginx \
    supervisor \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \          
    && docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy source code
COPY . .

# Copy Nginx config
COPY .docker/nginx/default.conf /etc/nginx/sites-available/default

# Copy Supervisor config
COPY .docker/supervisord.conf /etc/supervisord.conf

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set permissions
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

EXPOSE 80
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]

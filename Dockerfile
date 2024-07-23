# Use the official PHP image with FPM
FROM php:8.3-fpm

# Install Nginx and procps
RUN apt-get update && apt-get install -y nginx procps

# Remove the default server definition
RUN rm /etc/nginx/sites-enabled/default

# Copy custom server definition
COPY nginx.conf /etc/nginx/sites-available/default
RUN ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/

# Create necessary directories for Nginx
RUN mkdir -p /var/lib/nginx/body /var/run/nginx && \
    chown -R www-data:www-data /var/lib/nginx /var/run/nginx

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-configure gd \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl \
    && docker-php-ext-install pdo mbstring zip exif pcntl gd

# Install Composer
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www

# Expose port 8080
EXPOSE 8080

# Start Nginx and PHP-FPM
CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]

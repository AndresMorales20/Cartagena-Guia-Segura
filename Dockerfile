# Imagen base de PHP con extensiones necesarias para Laravel
FROM php:8.2-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# Instalar extensiones PHP necesarias
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Crear directorio de la aplicación
WORKDIR /var/www/html

# Copiar archivos
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Dar permisos
RUN chmod -R 775 storage bootstrap/cache

# Exponer el puerto estándar de PHP
EXPOSE 8000

# Comando de inicio
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000

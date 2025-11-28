# Usa una imagen base de PHP con Apache (recomendado para simplicidad de Laravel)
FROM php:8.2-apache

# Establece el directorio de trabajo dentro del contenedor
WORKDIR /var/www/html

# Instala dependencias del sistema operativo que PHP necesita (ej: GD, Zip, etc.)
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    && rm -rf /var/lib/apt/lists/*

# Instala extensiones PHP necesarias para Laravel
RUN docker-php-ext-install pdo pdo_mysql gd exif

# Instala Composer (el gestor de dependencias de PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia los archivos del proyecto a la imagen
COPY . .

# Instala las dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Configura las variables de entorno de la aplicación DENTRO de la imagen (solo por si acaso)
# NOTA: Las variables de Railway anularán esto.
RUN cp .env.example .env

# Genera la clave de aplicación y configura los permisos de la carpeta storage
RUN php artisan key:generate \
    && chmod -R 777 storage bootstrap/cache

# Habilita el módulo de reescritura de Apache (necesario para las rutas de Laravel)
RUN a2enmod rewrite

# Mueve la configuración por defecto de Apache a un archivo de configuración de Laravel
# Esto asegura que Apache sepa dónde está el index.php
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Define el puerto que el contenedor expone (Apache escucha en el 80 por defecto)
EXPOSE 80

# Comando de inicio: Apache se inicia automáticamente con la imagen base

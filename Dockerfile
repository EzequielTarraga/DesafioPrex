# Utiliza la imagen base de PHP 8.2.16
FROM php:8.2.16-fpm

# Establece el directorio de trabajo en el directorio de la aplicación
WORKDIR /var/www/html

# Instala las dependencias del sistema necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Copia los archivos de la aplicación al contenedor
COPY . .

# Instala las dependencias de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instala las dependencias de PHP
RUN composer install

# Exponer el puerto 9000 para PHP-FPM
EXPOSE 9000

# Iniciar el servidor PHP-FPM
CMD ["php-fpm"]

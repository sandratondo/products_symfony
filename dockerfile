# Usa una imagen oficial de PHP con FPM
FROM php:8.2-fpm

# Instala dependencias del sistema necesarias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libonig-dev \
    libxml2-dev \
    mariadb-client \
    && docker-php-ext-install \
    intl \
    pdo_mysql \
    mbstring \
    opcache \
    && docker-php-ext-enable \
    opcache

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Configuración de trabajo
WORKDIR /var/www/symfony

# Copia los archivos del proyecto al contenedor
COPY . .

# Instala dependencias de Composer
RUN composer install --no-scripts --no-interaction --optimize-autoloader

# Configura las variables de entorno para Symfony
ENV APP_ENV=dev
ENV APP_DEBUG=1

# Exponer el puerto para PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]

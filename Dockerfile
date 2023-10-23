# Utiliza una imagen de PHP como base
FROM php:7.4-apache

# Instala Curl y otros paquetes necesarios
RUN apt-get update && apt-get install -y curl libcurl4-openssl-dev

# Habilita el módulo Curl en PHP
RUN docker-php-ext-install curl

# Copia tus archivos PHP al directorio web de Apache
COPY src/ /var/www/html/

# Expone el puerto 80
EXPOSE 80

# Comando para iniciar Apache al ejecutar el contenedor
CMD ["apache2-foreground"]

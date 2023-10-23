# Usamos la imagen oficial de PHP con Apache
FROM php:8.0-apache

# Habilitamos la extensión cURL
RUN docker-php-ext-enable curl

# Copiamos nuestro script PHP al contenedor
COPY src/ /var/www/html/

# Exponemos el puerto 80 para el servidor web
EXPOSE 80

# Ejecutamos Apache en primer plano
CMD ["apache2-foreground"]

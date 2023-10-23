# Usamos la imagen oficial de PHP con Alpine
FROM php:8.0-fpm-alpine

# Instalamos cURL
RUN apk --no-cache add curl

# Copiamos nuestro script PHP al contenedor
COPY src/ /var/www/html/

# Exponemos el puerto 80 para el servidor web
EXPOSE 80

# Ejecutamos PHP en modo servidor
CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html/"]

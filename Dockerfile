# Usamos la imagen oficial de Ubuntu como base
FROM ubuntu:latest

# Actualizamos los paquetes del sistema
RUN apt-get update

# Instalamos PHP y cURL
RUN apt-get install -y php php-curl

# Copiamos nuestro script PHP al contenedor
COPY src/ /var/www/html/

# Exponemos el puerto 80 para el servidor web
EXPOSE 80

# Ejecutamos PHP en modo servidor
CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html/"]



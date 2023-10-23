FROM eboraas/apache-php
RUN apt-get update && apt-get -y install php5-curl
COPY src/ /var/www/html/

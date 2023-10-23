FROM eboraas/apache-php
RUN install php5-curl
COPY src/ /var/www/html/

FROM php:8.1-apache 

RUN docker-php-ext-install pdo pdo_mysql 

EXPOSE 80 

WORKDIR /var/www/html 

COPY . /var/www/html 

CMD ["apache2-foreground"] 
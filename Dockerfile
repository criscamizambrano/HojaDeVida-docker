FROM php:8.0-apache
LABEL maintainer="Cristian Zambrano <criscamizambrano@gmail.com>"
#Copio los archivos del sitio wweb dentro del contenedor
COPY . /hojaDeVida/
WORKDIR /var/www/html
#Añado extensiones necesarias para poder trabajar php con mysql, estas no estan por defecto
#dentro de la imagen de apache
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite

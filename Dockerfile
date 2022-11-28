FROM php:8.0-apache
WORKDIR /usr/src/app
COPY . .
EXPOSE 3000

FROM php:8.1-apache-buster

RUN apt-get clean
RUN apt-get update

#install some basic tools
RUN apt-get install -y \
        git \
        tree \
        vim \
        wget \
        subversion

#install some base extensions
RUN apt-get install -y \
	libzip-dev \
        zlib1g-dev \
        zip \

  && docker-php-ext-install zip
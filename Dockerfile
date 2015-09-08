FROM mooxe/base:latest

MAINTAINER FooTearth "footearth@gmail.com"

WORKDIR /root

# php 5.6 ppa
# RUN add-apt-repository ppa:ondrej/php5-5.6 -y

RUN \
  # update
  apt-get update && \
  apt-get update && \
  apt-get upgrade -y && \
  apt-get autoremove -y

RUN \

  # php
  apt-get install \
    php5 \
    php5-dev \
    php-pear \
    php5-cli \
    php5-common \
    php5-readline \
    php5-curl \
    php5-fpm \
    php5-mysqlnd \
    php5-mcrypt \
    php5-json \
    php5-ps \
    php5-gd \
    -y --force-yes && \

  # composer
  curl -sS https://getcomposer.org/installer | \
  sudo php -- --install-dir=/usr/local/bin --filename=composer && \

  # composer mirror
  composer config -g repositories.packagist composer \
    http://packagist.phpcomposer.com && \
  composer config --global github-oauth.github.com \
    ee62f829022e6c6986675340d07ff1b2da4a9ae9

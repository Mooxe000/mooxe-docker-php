FROM mooxe/base:latest

MAINTAINER FooTearth "footearth@gmail.com"

WORKDIR /root

# php 5.6 ppa
# RUN add-apt-repository ppa:ondrej/php5-5.6 -y

# update system
RUN \
  apt-get update && \
  apt-get update && \
  apt-get upgrade -y && \
  apt-get autoremove -y

# php install
RUN \
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
    -y --force-yes

# composer install
RUN \
  curl -sS https://getcomposer.org/installer | \
  sudo php -- --install-dir=/usr/local/bin --filename=composer

# composer config
RUN \
  composer config -g repositories.packagist composer \
    http://packagist.phpcomposer.com && \
  composer config -g github-oauth.github.com \
    2bd537dccb2c721a0744c2766acc084ee89befa3

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

RUN \
  # php install
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

  # composer install
  curl -sS https://getcomposer.org/installer | \
  sudo php -- --install-dir=/usr/local/bin --filename=composer && \

  # composer config
  composer config -g repositories.packagist composer \
    http://packagist.phpcomposer.com

FROM mooxe/base:latest

MAINTAINER FooTearth "footearth@gmail.com"

WORKDIR /root

RUN \
  # update
  apt-get update && \
  apt-get update && \
  apt-get upgrade -y && \
  apt-get autoremove -y

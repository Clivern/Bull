FROM ubuntu:18.04

ENV DEBIAN_FRONTEND noninteractive

RUN rm /bin/sh && ln -s /bin/bash /bin/sh

RUN apt-get update

RUN apt-get install -yq \
        php7.2 \
        build-essential \
        openssh-client \
        ca-certificates \
        git \
        php-xdebug \
        php7.2-bcmath \
        php7.2-cli \
        php7.2-curl \
        php7.2-gd \
        php7.2-intl \
        php7.2-mbstring \
        php7.2-mysql \
        php7.2-sqlite3 \
        php7.2-xmlrpc \
        php7.2-xsl \
        php7.2-xml \
        php7.2-zip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"

ENV HOME /opt
WORKDIR /opt

CMD ["php", "-a"]

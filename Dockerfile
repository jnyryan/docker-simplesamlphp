# simpleSAMLphp
#
# VERSION               0.0.1

FROM      ubuntu:14.04
MAINTAINER John Ryan "jnyryan@gmail.com"

ENV DEBIAN_FRONTEND noninteractive

####################
# apache2 server
RUN apt-get update  -y
RUN apt-get install -y git subversion curl htop
RUN apt-get install -y apache2
RUN apt-get install -y apache2-doc apache2-suexec-pristine apache2-suexec-custom apache2-utils openssl-blacklist
RUN apt-get install -y libmcrypt-dev mcrypt
RUN apt-get install -y php5 libapache2-mod-php5 php5-mcrypt php-pear
# php5-user-cache
RUN apt-get install -y php5-common php5-cli php5-curl php5-gmp php5-ldap
RUN apt-get install -y libapache2-mod-gnutls
RUN a2enmod gnutls
RUN /etc/init.d/apache2 restart

####################
# PKI
RUN mkdir -p /etc/ssl/private/
RUN openssl req -x509 -batch -nodes -newkey rsa:2048 -keyout /etc/ssl/private/server.pem -out /etc/ssl/private/server.crt


####################
# SimpleSaml

RUN git clone https://github.com/simplesamlphp/simplesamlphp.git /var/simplesamlphp
RUN mkdir -p /var/simplesamlphp/config && cp -r /var/simplesamlphp/config-templates/* /var/simplesamlphp/config/
RUN mkdir -p /var/simplesamlphp/metadata && cp -r /var/simplesamlphp/metadata-templates/* /var/simplesamlphp/metadata/
ADD ./etc/simplesamlphp/config.php /var/simplesamlphp/config/config.php
ADD ./etc/apache2/sites-enabled/000-default.conf /etc/apache2/sites-enabled/000-default.conf.bak
ADD ./etc/apache2/sites-enabled/000-default.conf /etc/apache2/sites-enabled/000-default.conf

####################
# Composer
RUN echo "extension=mcrypt.so" >> /etc/php5/cli/php.ini
RUN echo "extension=mcrypt.so" >>  /etc/php5/mods-available/mcrypt.ini
RUN php5enmod mcrypt
WORKDIR /var/simplesamlphp
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar install

####################
# Final bits

CMD ""/etc/init.d/apache2" restart

EXPOSE 80

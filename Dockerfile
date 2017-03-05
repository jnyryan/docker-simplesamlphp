# simpleSAMLphp
#
# VERSION               1.3.0

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
RUN apt-get install -y php5-common php5-cli php5-curl php5-gmp php5-ldap
RUN apt-get install -y libapache2-mod-gnutls
RUN apt-get install -y php5-sqlite
RUN a2enmod gnutls

####################
# SimpleSaml

RUN rm -rf /var/simplesamlphp
RUN git clone https://github.com/simplesamlphp/simplesamlphp.git /var/simplesamlphp

RUN mkdir -p /var/simplesamlphp/config && cp -r /var/simplesamlphp/config-templates/* /var/simplesamlphp/config/
RUN mkdir -p /var/simplesamlphp/metadata && cp -r /var/simplesamlphp/metadata-templates/* /var/simplesamlphp/metadata/

ADD ./etc/simplesamlphp/config/config.php /var/simplesamlphp/config/config.php
ADD ./etc/apache2/sites-enabled/000-default.conf /etc/apache2/sites-enabled/000-default.conf

####################
# PKI
RUN mkdir -p /var/simplesamlphp/cert && openssl req -x509 -batch -nodes -newkey rsa:2048 -keyout /var/simplesamlphp/cert/saml.pem -out /var/simplesamlphp/cert/saml.crt

##########
#Permissions
RUN chown -R www-data /var/lib/php5

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

EXPOSE 80
EXPOSE 443

ENTRYPOINT ["/usr/sbin/apache2ctl"]
CMD ["-D", "FOREGROUND"]

# vagrant-simplesamlphp

simpleSAMLphp installed on a vagrant virtual machine

##Intro

This is a an out-of-the-box setup for simpleSAMLphp. All the installation instructions are in the Vagrant_Provision.sh file

## Prerequisites
  - Install [VirtualBox](https://www.virtualbox.org/)
  - Install [VagrantUp](http://www.vagrantup.com/)

## Installation

``` bash
git clone <this repo>
vagrant up
vagrant ssh
```

To access simpleSAMLphp from the host server:

```
http://localhost:50080/simplesaml/

username: admin
password: password

```


### References

[simpleSAMLphp Installation and Configuration](https://simplesamlphp.org/docs/stable/simplesamlphp-install)
[How To Install Linux, Apache, MySQL, PHP (LAMP) stack on Ubuntu](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu)
[Using SimpleSAMLphp to Authenticate against ADFS 2.0 IdP](https://groups.google.com/forum/#!msg/simplesamlphp/I8IiDpeKSvY/URSlh-ssXQ4J)

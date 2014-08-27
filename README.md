# vagrant-simplesamlphp

simpleSAMLphp installed on a vagrant virtual machine and in a docker lightweight container

.. with the added bonus of installing it on a [Docker](https://www.docker.com/) lightweight container

## Introduction

This is a an out-of-the-box setup for simpleSAMLphp with no SSL/TLS but works really well.

All the installation instructions are in the Vagrant_Provision.sh file.

Exposed endpoints:

From the host machine ports 50080/50081 are forwarded to the Vagrant VM. To get
to either setup hit the following endpoints.

Vagrant Hosted: http://localhost:50080/simplesaml

Vagrant Hosted in a Docker Container : http://localhost:50081/simplesaml

## Prerequisites
  - Install [VirtualBox](https://www.virtualbox.org/)
  - Install [VagrantUp](http://www.vagrantup.com/)

## Installation

The following commands will download the Ubuntu Images and provision the virtual
machine. All software will be installed and once completed SimpleSAMLphp will
be ready to use.

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

---

# Details on the Docker Setup

Docker is a lightweight container that I use to host simpleSAMLphp running under
apache as an experiment. All the work down below is already done in the Vagrant
setup, the details are included if you would like to further develop it.

## Prerequisites

  - Install [Docker](https://www.docker.com/)
  ```
  sudo apt-get install -y docker.io
  sudo ln -sf /usr/bin/docker.io /usr/local/bin/docker
  sudo sed -i '$acomplete -F _docker docker' /etc/bash_completion.d/docker.io
  ```

## Install from DockerHub

Rather than build it yourself, the full container is available on [DockerHub](http://hub.docker.com)

``` bash
sudo docker pull jnyryan/simplesamlphp
sudo docker run -d -p 50080:80 jnyryan/simplesamlphp
```

To access simpleSAMLphp from the host server:

```
http://localhost:50081/simplesaml/

username: admin
password: password

```


## Build the Package and Publish it to Dockerhub

Build the package locally and push it to dockerhub

``` bash
sudo docker login
sudo docker pull jnyryan/simplesamlphp
sudo docker build -t jnyryan/simplesamlphp /vagrant/.
sudo docker push jnyryan/simplesamlphp
```

### Cleanup

This will clean up any old images built

``` bash
sudo bash
docker stop $(docker ps -a -q)
docker rm $(docker ps -a -q)
docker rmi $(docker images -a -q)
exit

```



### References

[simpleSAMLphp Installation and Configuration](https://simplesamlphp.org/docs/stable/simplesamlphp-install)
[How To Install Linux, Apache, MySQL, PHP (LAMP) stack on Ubuntu](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu)
[Using SimpleSAMLphp to Authenticate against ADFS 2.0 IdP](https://groups.google.com/forum/#!msg/simplesamlphp/I8IiDpeKSvY/URSlh-ssXQ4J)

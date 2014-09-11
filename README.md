# docker-simplesamlphp

simpleSAMLphp installed on a vagrant virtual machine and hosted in Docker.


##Introduction

This is plug and play. Run the installation and SimpleSAMLphp will be waiting

## Prerequisites

This setup uses VirtualBox and VagrantUp to instanciate the virtual machines
  - Install [VirtualBox](https://www.virtualbox.org/)
  - Install [VagrantUp](http://www.vagrantup.com/)

## Installation

The following commands will download the Ubuntu Images and provision the virtual
machine. All software will be installed and once completed SimpleSAMLphp will
be ready to use.

``` bash
git clone https://github.com/jnyryan/docker-simplesamlphp.git
cd docker-simplesamlphp
vagrant up
vagrant ssh
```

## Usage

From the host machine the following ports are forwarded to the Vagrant VM.

- 58080
- 58443

To get to either the HTTP or HTTPS setup hit the following endpoints:

  - http://localhost:58080/simplesaml
  - https://localhost:58443/simplesaml

To access simpleSAMLphp from the browser:

```
username: admin
password: password
```


---

# Edit and create your own SimpleSAMLphp in a Docker Container

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

Rather than build it yourself, the full container is available on [DockerHub](https://registry.hub.docker.com/u/jnyryan/simplesamlphp/)

``` bash
sudo docker pull jnyryan/simplesamlphp
sudo docker run -d -p 58080:80 -p 58443:443 jnyryan/simplesamlphp
```

To access simpleSAMLphp from the host server:

```
http://localhost:50081/simplesaml/

username: admin
password: password

```

To use your own configs stored on the host in /var/simplesamlphp

``` bash
sudo docker run -d -p 58080:80 -p 58443:443 \
-v /var/simplesamlphp/config/:/var/simplesamlphp/config/ -v /var/simplesamlphp/metadata/:/var/simplesamlphp/metadata/ -v /var/simplesamlphp/cert/:/var/simplesamlphp/cert/ \
jnyryan/simplesamlphp
```˛

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

[Configuring HTTPS on Apache with GnuTLS](https://help.ubuntu.com/community/GnuTLS)

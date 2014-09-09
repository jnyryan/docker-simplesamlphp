# vagrant-simplesamlphp

simpleSAMLphp installed on a vagrant virtual machine.

.. with the added bonus of also installing it on a [Docker](https://www.docker.com/) lightweight container... just for kicks

.. and i added some details on connecting it to ADFS as an IdP

I probably did too much in a single repository but i got a bit carried away.

##Introduction

This repo details 3 usages of SimpleSAMLphp

1. This is a an out-of-the-box setup for simpleSAMLphp.

  Once the Vagrant virtual machine is booted up all the software is installed by the provisioning script.

  You can read the [provision script](Vagrant_Provision.sh) to see all the installation.

2. The above, installed on a Docker Container

3. The above with configs altered to use ADFS as an Identity Provider

## Usage

From the host machine the following ports are forwarded to the Vagrant VM.

- 50080
- 50443
- 58080
- 58443

To get to either the HTTP or HTTPS setup hit the following endpoints:

Vagrant Hosted:

  - http://localhost:50080/simplesaml
  - https://localhost:50443/simplesaml

Vagrant Hosted in a Docker Container :

These both require you to ssh to the vm and run the steps below

  - http://localhost:58080/simplesaml
  - https://localhost:58443/simplesaml

To access simpleSAMLphp from the browser:

```
username: admin
password: password
```

## Prerequisites

This setup uses VirtualBox and VagrantUp to instanciate the virtual machines
  - Install [VirtualBox](https://www.virtualbox.org/)
  - Install [VagrantUp](http://www.vagrantup.com/)

## SimpleSAML Server Installation

The following commands will download the Ubuntu Images and provision the virtual
machine. All software will be installed and once completed SimpleSAMLphp will
be ready to use.

``` bash
git clone https://github.com/jnyryan/vagrant-simplesamlphp.git
cd vagrant-simplesamlphp
vagrant up
vagrant ssh
```

---

# SimpleSAMLphp in a Docker Container

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

To use your own configs stored on the host in /var/simplesamlphp

``` bash
sudo docker run -d -p 58080:80 -p 58443:443 \
-v /var/simplesamlphp/config/:/var/simplesamlphp/config/ -v /var/simplesamlphp/metadata/:/var/simplesamlphp/metadata/ -v /var/simplesamlphp/cert/:/var/simplesamlphp/cert/ \
jnyryan/simplesamlphp
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

---

# 3. Playing With ADFS and SimpleSAMLphp

##ADFS Server Installation

These instructions provide a good ADFS set-up

[installing-and-configuring-adfs-2-0](http://www.sysadminsblog.com/microsoft/installing-and-configuring-adfs-2-0/)

[using-active-directory-federation-services-to-authenticate-authorize-node-js-apps-in-windows-azure](http://seroter.wordpress.com/2013/04/22/using-active-directory-federation-services-to-authenticate-authorize-node-js-apps-in-windows-azure/)

## Configuring SimpleSAMLphp as a Service Provider connecting to ADFS

To play around with ADFS as a IdP i used the instructions below [from here](https://groups.google.com/forum/#!msg/simplesamlphp/I8IiDpeKSvY/URSlh-ssXQ4J)

SimpleSAML is installed on www.mysite.com

ADFS2 is installed on www.myadfs.com.

- Open a browser and go to URL http://www.myadfs.com/Federationmetadata/2007-06/FederationMetadata.xml
- Save as FederationMetadata.xml.

- Open a browser and go to https://www.mysite.com/simplesaml/
- Select Federation tab
- Click on Convert XML Metadata to simpleSAML.php
- Paste the content of the previous file (FederationMetadata.xml)
- Click on Analyse
- On saml20-idp-remote section, select all text and copy it
- Edit the file <document_root>/simplesamlphp/metadata/saml20-idp-
- remote.php (save a copy like saml20-idp-remote.bak)
- Delete all text between <?php … ?> (keep "<?php" and "?>"
- Paste the previous selected text between "<?php" and "?>"
- Under ‘entityid’ line, add following line: ‘sign.logout’ => TRUE,
- Save saml20-idp-remote.php

Edit the file <document_root>/simplesamlphp/config/authsources.php
in the $config array adds an entry like

```
'myauth' => array(
    'saml:SP',
    'idp' => 'http://www.myadfs.com/adfs/services/trust',
    'privatekey' => '001-mysite.key',
    'certificate' => '001-mysite.crt',
),
```

- On ADFS server, open the ADFS 2.0 consol
- Go to Approbation relationship, and Relaying party approbation.
- Click on Add approbation
- Click on Start
- Enter the following address: https://www.mysite.com/simplesaml/module.php/saml/sp/metadata.php/myauth
- Click on OK.
- Enter the application name.
- Click on Next.
- Click on Authorize user access to this relying party.
- Click on Next.
- Click on Next.
- Click on Close.
- Adds and configures all the rules you need.
- Click on OK.
- The new relaying party is added.
- Double click on it.
- On advanced tab, select algorithm hash to SHA-1.
- Click on OK.

### References

[simpleSAMLphp Installation and Configuration](https://simplesamlphp.org/docs/stable/simplesamlphp-install)

[How To Install Linux, Apache, MySQL, PHP (LAMP) stack on Ubuntu](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu)

[Using SimpleSAMLphp to Authenticate against ADFS 2.0 IdP](https://groups.google.com/forum/#!msg/simplesamlphp/I8IiDpeKSvY/URSlh-ssXQ4J)

[Configuring HTTPS on Apache with GnuTLS](https://help.ubuntu.com/community/GnuTLS)

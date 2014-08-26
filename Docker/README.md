# docker-simpleSAMLphp

a docker container to run simpleSAMLphp.

##Introduction

This is a basic off-the-shelf install, no SSL/TLS but works real well


## Install from DockerHub

``` bash
sudo docker pull jnyryan/simplesamlphp
sudo docker run -d -p 50080:80 jnyryan/simplesamlphp
```

To access simpleSAMLphp from the host server:

```
http://localhost:50080/simplesaml/

username: admin
password: password

```


## Build the Package and Publish it to Dockerhub

Install Docker

```
sudo apt-get install -y docker.io
sudo ln -sf /usr/bin/docker.io /usr/local/bin/docker
sudo sed -i '$acomplete -F _docker docker' /etc/bash_completion.d/docker.io
```

Build the package locally and push it to dockerhub

``` bash
sudo docker login
sudo docker pull jnyryan/simplesamlphp
sudo docker build -t jnyryan/simplesamlphp /vagrant/Docker/.
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

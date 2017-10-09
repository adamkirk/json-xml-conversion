### Running this test

To run this test, you will need php7.0.

I've included the docker.sh script will spin up a php7.0 container so the script can be executed, without having to 
affect the host machine.

To get it running, should be as simple as:

### Install docker

#### OS X (brew)

```
$ brew install docker docker-machine
```

You will also need some kind of docker host (you can source this yourself as there are many ways).

Dinghy is a nice easy one to use, if you're new to docker (I'd recomend reading the docs first: 
https://github.com/codekitchen/dinghy).

```
$ brew tap codekitchen/dinghy
$ brew install dinghy
```

You should already have virtual box (from the standard dev env).

Run this, which will create a VM which will act as the docker host.

```
$ dinghy create --provider virtualbox
$ ./docker.sh
```

This will put you inside a php7.0 container. From here you can run:

```angular2html
$ php ./test.php
```

#### Linux (Ubuntu and th like)

This is alot simpler, so just refer to the docker documentation:

https://docs.docker.com/engine/installation/linux/docker-ce/ubuntu/#install-using-the-repository

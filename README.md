# thisisdevelopment/laravel-base

An opinionated base laravel install. 

## Install

```
composer create-project thisisdevelopment/laravel-base <dir>
```

Or alternatively if you don't have composer installed locally:

```
dir=<dir>
git clone https://github.com/thisisdevelopment/laravel-base $dir
cd $dir
rm -rf .git
./bin/dev init
```

## Folder structure

This is modeled after the domain oriented structure proposed by sticher.io:  https://stitcher.io/blog/laravel-beyond-crud-01-domain-oriented-laravel
The proposed structure is extended with the concept of modules, which are default implementations of generic domain code. 

The complete structure is

- `app` <= toplevel app dir, no code here
- `app/App/<app name>/` <= application specific code
- `app/Domain/<domain>` <= domain specific code
- `app/Domain/vendor/<domain>` <= generic domain code (managed by composer, for packages with type=laravel-domain) 
- `app/Module/<module>` <= module code (managed by composer, for packages with type=laravel-module) 
- `packages/<package>/` <= composer wil automatically pickup any packages in this directory. This allows to develop packages alongside your application (see [packages/README.md](packages/README.md)) 

It uses `oomphinc/composer-installers-extender` to install packages of type laravel-module/laravel-domain to the `app/Module` and `app/Domain/vendor` folders.  

## Docker compose support

This base install comes with a complete docker-compose setup out of the box. 
It assumes you have a working local docker install which allows access to docker for your own user.

To easily access the containers you should also run the `thisisdevelopment/docker-hoster` container (see https://github.com/thisisdevelopment/docker-hoster) to dynamically update your hosts file.

```
docker run --restart=unless-stopped -d \
    -v /var/run/docker.sock:/tmp/docker.sock \
    -v /etc/hosts:/tmp/hosts \
    thisisdevelopment/docker-hoster
```

## Dev script

To easily access the containers you should use the included `bin/dev` script.
This script allows for easy execution of composer etc inside your containers.

The supported commands are:

- `up`
- `down`
- `rm`
- `deploy`
- `logs`
- `php-cli`
- `composer`
- `artisan`
- `phpcs`
- `phpcbf`
- `phpunit`

## Coding standards

This base install enforces the `PSR-12` code standard. It does this by installing a git-hook which enforces this standard (by means of `phpcs`)

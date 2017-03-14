#!/bin/sh

# Composer install.
if [ ! -f /usr/bin/composer ]; then
    curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/bin/composer
fi

# Install server dependencies.
apt-get update
apt-get install -y git zip unzip curl

# Install code dependencies.
cd /code
composer install

# Keep container running
echo "Spawn successful, running"
tail -f /dev/null

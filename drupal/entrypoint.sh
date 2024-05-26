#!/bin/bash

cd /opt/drupal/
composer require "drush/drush" "drupal/admin_toolbar:^3.4" "drupal/blog:^3" "drupal/profile:^1" "drupal/pathauto"

if [ ! -e "/usr/bin/drush" ]; then
  ln -s /opt/drupal/vendor/bin/drush /usr/bin/drush
fi

# symlink the composer file
rm /opt/drupal/composer.json /opt/drupal/composer.lock
ln -s /tmp/composer/composer.json /opt/drupal/composer.json
ln -s /tmp/composer/composer.lock /opt/drupal/composer.lock
composer install -n

# /opt/drupal/vendor/bin/drush config:import -y

service apache2 start
# the above line should keep the container running
tail -f /dev/null

#!/bin/sh

# Clearing the cache and the logs
sudo rm -rf app/cache/*  app/logs/*.log
touch app/logs/{prod,dev}.log

# Updating the vendors
composer update -o --no-dev

# Updating the database
app/console doctrine:schema:update --force

# Setting up the cache
./tools/clear_cache.sh

exit 0
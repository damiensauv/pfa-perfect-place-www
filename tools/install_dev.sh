#!/bin/sh

# Installing the vendors
composer install

# Installing the git hooks
rm -f `pwd`/.git/hooks/*
ln -fs `pwd`/tools/git_hook_dev_pull.sh `pwd`/.git/hooks/post-merge

# Setting up the cache
./tools/clear_cache.sh

# Installing the assetic
app/console assetic:dump
app/console assetic:dump --env=prod --no-debug

# Setting up the database
app/console doctrine:database:drop --force
app/console doctrine:database:create
app/console doctrine:schema:update --force

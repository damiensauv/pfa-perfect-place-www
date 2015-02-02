#!/bin/bash

sudo rm -rf app/cache/* app/logs/*.log
app/console cache:clear
app/console cache:clear --env=prod
app/console cache:warmup
app/console cache:warmup --env=prod
touch app/logs/{prod,dev}.log
APACHE_USER=$(ps axho user,comm|grep -E "httpd|apache"|uniq|grep -v "root"|awk 'END {if ($1) print $1}')
setfacl -R -m u:"$APACHE_USER":rwx app/cache app/logs app/logs/*
#!/bin/bash -e

echo "begin hook ${0}"

composer install

./bin/console doctrine:migrations:migrate -n

php-fpm

echo "end hook ${0}"

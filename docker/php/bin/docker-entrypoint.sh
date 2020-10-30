#!/bin/bash -e

echo "begin hook ${0}"

./bin/console doctrine:migrations:migrate -n

php-fpm

echo "end hook ${0}"

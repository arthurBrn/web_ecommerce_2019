#!/usr/bin/env bash


docker exec -ti symfony_container ./backend/bin/console doctrine:database:create

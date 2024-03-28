# A simple tool for generating an environment for PHP development

## Installation

Clone and installa dependencies:

    composer install

## Usage

To execute it you need to be in src folder:

    cd src

Then:

    php index.php

This will generate the following folder structure:

    dist/
      docker/
        php/
          Dockerfile
      docker-compose.yml

So, once generated just enter dist/ folder an execute

    docker-compose up --build

## Run tests

Tests execution is done in the project's main folder:

    vendor/phpunit/phpunit/phpunit --color tests/

## Status

* [2024/03/26] Added XDebug.
* [2024/03/26] Added MySQL. It now creates all needed files (Dockerfile and docker-compose.yml).
* [2024/03/23] Just started. It just generates a PHP-FPM 8.2 based Dockerfile with gd extension.

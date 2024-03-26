# A simple tool for generating an environment for PHP development

## Installation

    composer install
## Usage
To execute it you need to be in src folder:

    cd src
Then:

    php index.php

## Run tests
Tests execution is done in the main folder of the proyect.

    vendor/phpunit/phpunit/phpunit --color tests/

## Status

[2024/03/23] Just started. It just generates a PHP-FPM 8.2 based Docker file with gd extension.

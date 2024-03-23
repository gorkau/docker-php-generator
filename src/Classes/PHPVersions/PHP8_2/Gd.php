<?php

namespace Gorkau\DockerPhpGenerator\Classes\PHPVersions\PHP8_2;

class Gd
{
    public function libInstallation() : string
    {
        return "apt install -y libzip-dev zip";
    }

    public function moduleConfiguration() : string
    {
        return "docker-php-ext-configure gd --with-jpeg";
    }

    public function moduleInstallation() : string
    {
        return "docker-php-ext-install -j$(nproc) gd";
    }
}
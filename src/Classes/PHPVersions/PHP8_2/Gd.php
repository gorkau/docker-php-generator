<?php

namespace Gorkau\DockerPhpGenerator\Classes\PHPVersions\PHP8_2;

class Gd implements ModuleInterface
{
    public function libInstallation() : string
    {
        return "apt install -y libjpeg-dev libpng-dev";
    }

    public function moduleConfiguration() : string
    {
        return "docker-php-ext-configure gd --with-jpeg";
    }

    public function moduleInstallation() : string
    {
        return "docker-php-ext-install -j$(nproc) gd";
    }

    public function moduleEnable(): string
    {
        return "";
    }
}
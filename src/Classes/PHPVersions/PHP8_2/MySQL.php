<?php

namespace Gorkau\DockerPhpGenerator\Classes\PHPVersions\PHP8_2;

class MySQL implements ModuleInterface
{

    public function libInstallation(): string
    {
        return '';
    }

    public function moduleConfiguration(): string
    {
        return '';
    }

    public function moduleInstallation(): string
    {
        return 'docker-php-ext-install mysqli pdo pdo_mysql';
    }

    public function moduleEnable(): string
    {
        return 'docker-php-ext-enable pdo_mysql';
    }
}
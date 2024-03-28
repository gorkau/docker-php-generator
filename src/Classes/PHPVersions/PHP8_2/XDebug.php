<?php

namespace Gorkau\DockerPhpGenerator\Classes\PHPVersions\PHP8_2;

class XDebug implements ModuleInterface
{
    public function libInstallation() : string
    {
        return "pecl install xdebug";
    }

    public function moduleConfiguration() : string
    {
        return "";
    }

    public function moduleInstallation() : string
    {
        return "";
    }

    public function moduleEnable(): string
    {
        return 'docker-php-ext-enable xdebug';
    }
}
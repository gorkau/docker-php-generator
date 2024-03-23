<?php

namespace Gorkau\DockerPhpGenerator\Classes;

use Gorkau\DockerPhpGenerator\Classes\PHPVersions\PHPVersionInterface;

class DockerGenerator
{
    public function __construct(private PHPVersionInterface $php) {}

    public function generate()
    {
        $file = "FROM: " . $this->php->phpBaseName() . PHP_EOL;

        $file .= $this->php->libsInstallation() . PHP_EOL;
        $file .= $this->php->phpModulesConfiguration() . PHP_EOL;
        $file .= $this->php->phpModulesInstallation() . PHP_EOL;

        return $file;
    }
}
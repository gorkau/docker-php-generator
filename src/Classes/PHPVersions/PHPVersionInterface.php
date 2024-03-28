<?php

namespace Gorkau\DockerPhpGenerator\Classes\PHPVersions;

interface PHPVersionInterface
{
    public function phpBaseName() : string;
    public function libsInstallation() : string;
    public function phpModulesConfiguration() : string;
    public function phpModulesEnable() : string;
}
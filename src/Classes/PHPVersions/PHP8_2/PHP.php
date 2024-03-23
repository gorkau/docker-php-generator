<?php

namespace Gorkau\DockerPhpGenerator\Classes\PHPVersions\PHP8_2;

use Gorkau\DockerPhpGenerator\Classes\PHPVersions\PHPVersionInterface;
use Gorkau\DockerPhpGenerator\Classes\PHPVersions\PHP8_2\Gd;

class PHP implements PHPVersionInterface
{
    const CONCATENATOR = " && ";
    public function __construct(array $modules) {
        foreach($modules as $module) {
            $moduleClass = __NAMESPACE__ . "\\{$module}";
            $this->modules[] = new $moduleClass();
        }
    }

    public function phpBaseName(): string
    {
        return "php:8.2-fpm";
    }

    public function libsInstallation() : string
    {
        $libsInstallation = "RUN apt update";
        $modules = [];

        foreach($this->modules as $module) {
            $modules[] = $module->libInstallation();
        }

        if (count($modules)) {
            $libsInstallation .= $this::CONCATENATOR . implode($this::CONCATENATOR, $modules);
        }

        return $libsInstallation;
    }

    public function phpModulesConfiguration() : string
    {
        $phpModulesConfiguration = "";
        $modules = [];

        foreach($this->modules as $module) {
            $modules[] = $module->moduleConfiguration();
        }

        if (count($modules)) {
            $phpModulesConfiguration = "RUN " . implode($this::CONCATENATOR, $modules);
        }

        return $phpModulesConfiguration;
    }

    public function phpModulesInstallation() : string
    {
        $phpModulesInstallation = "";
        $modules = [];

        foreach($this->modules as $module) {
            $modules[] = $module->moduleInstallation();
        }

        if (count($modules)) {
            $phpModulesInstallation = "RUN " . implode($this::CONCATENATOR, $modules);
        }

        return $phpModulesInstallation;
    }
}
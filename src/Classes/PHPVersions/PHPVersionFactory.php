<?php

namespace Gorkau\DockerPhpGenerator\Classes\PHPVersions;

class PHPVersionFactory
{
    public function __construct(private string $phpVersion, private array $modules) {}

    public function get()
    {
        $phpVersion = str_replace(".", "_", $this->phpVersion);
        $phpClass = __NAMESPACE__ . "\\PHP{$phpVersion}\\PHP";
        return new $phpClass($this->modules);
    }
}
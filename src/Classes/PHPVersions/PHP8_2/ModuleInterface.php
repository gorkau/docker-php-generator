<?php

namespace Gorkau\DockerPhpGenerator\Classes\PHPVersions\PHP8_2;

interface ModuleInterface
{
    public function libInstallation(): string;
    public function moduleConfiguration(): string;
    public function moduleInstallation(): string;
}
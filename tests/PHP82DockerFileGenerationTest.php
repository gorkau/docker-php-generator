<?php

use Gorkau\DockerPhpGenerator\Classes\PHPVersions\PHP8_2\Gd;
use Gorkau\DockerPhpGenerator\Classes\PHPVersions\PHP8_2\PHP;
use PHPUnit\Framework\TestCase;

class PHP82DockerFileGenerationTest extends TestCase
{
    /** @test */
    public function it_should_generate_a_dockerfile_with_no_modules()
    {
        $php = new PHP([]);

        $this->assertEquals('', $php->libsInstallation());
        $this->assertEquals('', $php->phpModulesEnable());
        $this->assertEquals('', $php->phpModulesInstallation());
        $this->assertEquals('', $php->phpModulesConfiguration());
    }

    /** @test */
    public function it_should_add_one_module()
    {
        $gd = new Gd();
        $php = new PHP(['Gd']);

        $this->assertEquals("RUN apt update && {$gd->libInstallation()}", $php->libsInstallation());
        $this->assertStringContainsString($gd->moduleEnable(), $php->phpModulesEnable());
        $this->assertStringContainsString($gd->moduleInstallation(), $php->phpModulesInstallation());
        $this->assertStringContainsString($gd->moduleConfiguration(), $php->phpModulesConfiguration());
    }
}
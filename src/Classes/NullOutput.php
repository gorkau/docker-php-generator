<?php

namespace Gorkau\DockerPhpGenerator\Classes;

class NullOutput implements OutputInterface
{

    public function display($message): void
    {
        return;
    }
}
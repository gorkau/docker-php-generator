<?php

namespace Gorkau\DockerPhpGenerator\Classes;

class Output implements OutputInterface
{

    public function display($message): void
    {
        echo $message;
    }
}
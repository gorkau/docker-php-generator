<?php

namespace Gorkau\DockerPhpGenerator\Classes;

interface OutputInterface
{
    public function display($message) : void;
}
<?php

namespace Gorkau\DockerPhpGenerator\Classes;

interface UserInputReaderInterface
{
    public function ask(string $prompt) : string;
}
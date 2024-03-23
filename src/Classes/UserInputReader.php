<?php

namespace Gorkau\DockerPhpGenerator\Classes;

class UserInputReader implements UserInputReaderInterface
{

    public function ask(string $prompt): string
    {
        return readline("$prompt ");
    }
}
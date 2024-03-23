<?php

namespace Gorkau\DockerPhpGenerator\Classes;

class UserInputReaderFaker implements UserInputReaderInterface
{
    private array $answers;

    public function pushUserInput(string $text)
    {
        $this->answers[] = $text;
    }

    public function ask(string $prompt): string
    {
        return array_shift($this->answers);
    }
}
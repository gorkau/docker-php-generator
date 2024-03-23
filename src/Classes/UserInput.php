<?php

namespace Gorkau\DockerPhpGenerator\Classes;

use SebastianBergmann\Environment\Console;

class UserInput
{
    private string $response;
    public function __construct(
        private UserInputReaderInterface    $userInput,
        private OutputInterface             $output,
        private string                      $prompt,
        private                             $acceptedValues = [],
        private                             $required = false
    ) {}

    public function get()
    {
        do {
            $this->displayValidValues();
            $this->response = $this->userInput->ask($this->prompt);
        } while ($this->shouldRepeat());

        return $this->response;
    }

    private function shouldRepeat()
    {
        if ($this->required) {
            if (!$this->valueIsAcceptable()) {
                return true;
            }
            return !$this->response;
        }
        return false;
    }

    private function valueIsAcceptable() {
        foreach($this->acceptedValues as $value) {
            if ($this->response == $value) {
                return true;
            }
        }
        return !(count($this->acceptedValues) && !in_array($this->response, $this->acceptedValues));
    }

    private function displayValidValues()
    {
        $this->output->display("Please, type one of the accepted values:\n");
        foreach($this->acceptedValues as $value) {
            $this->output->display("* {$value}\n");
        }
    }

}
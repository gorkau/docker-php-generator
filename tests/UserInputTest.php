<?php

use Gorkau\DockerPhpGenerator\Classes\NullOutput;
use Gorkau\DockerPhpGenerator\Classes\OutputInterface;
use Gorkau\DockerPhpGenerator\Classes\UserInputReaderFaker;
use Gorkau\DockerPhpGenerator\Classes\UserInput;
use PHPUnit\Framework\TestCase;

class UserInputTest extends TestCase
{
    private OutputInterface $output;
    protected function setUp(): void
    {
        parent::setUp();
        $this->output = new NullOutput();
    }

    /** @test */
    public function it_should_get_user_response()
    {
        $userInputFaker = new UserInputReaderFaker();
        $userInputFaker->pushUserInput("8.2");

        $userInput = new UserInput($userInputFaker, $this->output,"PHP Version", [], false);

        $this->assertEquals("8.2", $userInput->get());
    }

    /** @test */
    public function it_should_accept_empty_user_response()
    {
        $userInputFaker = new UserInputReaderFaker();
        $userInputFaker->pushUserInput("");

        $userInput = new UserInput($userInputFaker, $this->output, "PHP Version", [], false);

        $this->assertEquals("", $userInput->get());
    }

    /** @test */
    public function it_should_ask_again_for_a_reply_if_answer_is_required_but_it_is_empty()
    {
        $userInputFaker = new UserInputReaderFaker();
        $userInputFaker->pushUserInput("");
        $userInputFaker->pushUserInput("8.2");

        $userInput = new UserInput($userInputFaker, $this->output, "PHP Version", [], true);

        $this->assertEquals("8.2", $userInput->get());
    }
    
    /** @test */
    public function it_should_ask_again_for_a_reply_if_not_in_valid_answers()
    {
        $userInputFaker = new UserInputReaderFaker();
        $userInputFaker->pushUserInput("200");
        $userInputFaker->pushUserInput("8.2");

        $userInput = new UserInput($userInputFaker, $this->output, "PHP Version", ["8.2"], true);

        $this->assertEquals("8.2", $userInput->get());
    }
}
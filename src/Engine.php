<?php

namespace BrainGames\Engine;

require_once __DIR__  . '/../vendor/autoload.php';

use function BrainGames\Cli\line;
use function BrainGames\Cli\prompt;

function welcome()
{
    line("Welcome to the Brain Game!\n");
    $name = prompt('May I have your name? ');
    line("Hello, %s!\n", $name);
    return $name;
}

function result($numberCorrectAnswers, $name, $incorrectAnswer)
{
    if ($incorrectAnswer == 1) {
        line("Incorrect answer. ");
    }
    if ($numberCorrectAnswers == 3) {
        line("Congratilations, $name!\n");
    } else {
        line("Let's try again, $name!\n");
    }
}

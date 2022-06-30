<?php

namespace BrainGames\Engine;

// require_once __DIR__  . '/../vendor/autoload.php';

use function Cli\line;
use function Cli\prompt;

function welcome()
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    return $name;
}

function result($numberCorrectAnswers, $name, $incorrectAnswer)
{
    if ($incorrectAnswer == 1) {
        line("Incorrect answer. ");
    }
    if ($numberCorrectAnswers == 3) {
        line("Congratilations, $name!");
    } else {
        line("Let's try again, $name!");
    }
}

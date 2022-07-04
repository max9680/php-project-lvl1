<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function welcome(string $gameDescription = null)
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    if ($gameDescription !== null) {
        line($gameDescription);
    }
    return $name;
}

function result(int $numberCorrectAnswers, string $name, int $incorrectAnswer)
{
    if ($incorrectAnswer == 1) {
        line("Incorrect answer. ");
    }
    if ($numberCorrectAnswers == 3) {
        line("Congratulations, $name!");
    } else {
        line("Let's try again, $name!");
    }
}

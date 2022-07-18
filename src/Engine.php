<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function runGreeting()
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    return $name;
}

function startGame(array $gameData, string $name, string $gameDescription)
{
    line($gameDescription);
    foreach ($gameData as [$question, $correctAnswer]) {
        line("Question: %s", $question);
        $answer = prompt("Your answer");
        if ($answer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, $name!");
            return;
        }
        line("Correct!");
    }
    line("Congratulations, %s!", $name);
}

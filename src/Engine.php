<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function getUserName()
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    return $name;
}

function startGame(array $gameData, string $name, string $gameDescription)
{
    line($gameDescription);
    foreach ($gameData as [0 => $question, 1 => $correctAnswer]) {
        line("Question: %s", $question);
        $answer = prompt("Your answer");
        if ($answer === $correctAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, $name!");
            return;
        }
    }
    line("Congratulations, %s!", $name);
}

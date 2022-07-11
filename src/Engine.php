<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function runWelcome(string $gameDescription = null)
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    if ($gameDescription !== null) {
        line($gameDescription);
    }
    return $name;
}

function startGame(array $gameData, string $name, int $numberGames)
{
    for ($i = 0; $i < $numberGames; $i++) {
        line("Question: %s", $gameData[$i][0]);
        $answer = prompt("Your answer");
        if ($answer === $gameData[$i][1]) {
            line("Correct!");
            if ($i == ($numberGames - 1)) {
                line("Congratulations, %s!", $name);
            }
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $gameData[$i][1]);
            line("Let's try again, $name!");
            return;
        }
    }
}

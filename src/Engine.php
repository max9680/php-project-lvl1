<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const GAME_ROUNDS = 3;

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
    for ($i = 0; $i < GAME_ROUNDS; $i++) {
        line("Question: %s", $gameData[$i][0]);
        $answer = prompt("Your answer");
        if ($answer === $gameData[$i][1]) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $gameData[$i][1]);
            line("Let's try again, $name!");
            return;
        }
    }
    line("Congratulations, %s!", $name);
}

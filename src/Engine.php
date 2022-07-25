<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function startGame(array $gameData, string $GAME_DESCRIPTION)
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");

    line("Hello, %s!", $name);

    line($GAME_DESCRIPTION);

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

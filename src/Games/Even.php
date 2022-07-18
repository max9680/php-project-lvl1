<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\startGame;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no"';

function runGame()
{
    $gameData = [];

    for ($i = 0; $i < 3; $i++) {
        $startNumber = 0;
        $endNumber = 100;
        $number = rand($startNumber, $endNumber);
        if ($number % 2 == 0) {
            $correctAnswer = "yes";
        } else {
            $correctAnswer = "no";
        }
        $gameData[] = [$number, $correctAnswer];
    }
    startGame($gameData, GAME_DESCRIPTION);
}

<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no"';

function runGame()
{
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $startNumber = 0;
        $endNumber = 100;
        $number = rand($startNumber, $endNumber);

        $correctAnswer = ($number % 2 == 0) ? "yes" : "no";
        
        $gameData[] = [$number, $correctAnswer];
    }
    startGame($gameData, GAME_DESCRIPTION);
}

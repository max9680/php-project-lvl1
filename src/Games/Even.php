<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runWelcome;
use function BrainGames\Engine\startGame;

function runGame()
{
    $name = runWelcome("Answer \"yes\" if the number is even, otherwise answer \"no\"");
    $gameData = [];

    for ($i = 0; $i < $numberGames; $i++) {
        $startNumber = 0;
        $endNumber = 100;
        $number = rand($startNumber, $endNumber);
        if ($number % 2 == 0) {
            $correctAnswer = "yes";
        } else {
            $correctAnswer = "no";
        }
        $gameData[$i][0] = $number;
        $gameData[$i][1] = $correctAnswer;
    }
    startGame($gameData, $name);
}

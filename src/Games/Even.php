<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\welcome;
use function BrainGames\Engine\gameEngine;

function runGame()
{
    $name = welcome("Answer \"yes\" if the number is even, otherwise answer \"no\"");
    $gameData = [];
    $numberGames = 3;

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
    gameEngine($gameData, $name, $numberGames);
}

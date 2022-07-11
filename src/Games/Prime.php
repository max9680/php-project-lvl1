<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runWelcome;
use function BrainGames\Engine\startGame;

function runGame()
{
    $name = runWelcome("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");
    $gameData = [];
    $numberGames = 3;
    (string) $correctAnswer = null;
    for ($i = 0; $i < $numberGames; $i++) {
        $number = rand(1, 100);
        if ($number == 1) {
            $correctAnswer = "yes";
        } else {
            for ($j = 2; $j < $number; $j++) {
                if ($number % $j == 0) {
                    $correctAnswer = "no";
                    break;
                }
                if ($number == ($j + 1)) {
                    $correctAnswer = "yes";
                }
            }
        }
        $gameData[$i][0] = $number;
        $gameData[$i][1] = strval($correctAnswer);
    }
    startGame($gameData, $name, $numberGames);
}

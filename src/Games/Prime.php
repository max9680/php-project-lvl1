<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\startGame;

const GAME_DESCRIPTION = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";

function runGame()
{
    $gameData = [];
    (string) $correctAnswer = null;
    for ($i = 0; $i < 3; $i++) {
        $number = rand(1, 100);
        if ($number <= 2) {
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
    startGame($gameData, GAME_DESCRIPTION);
}

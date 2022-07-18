<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\startGame;

const GAME_DESCRIPTION = "Find the greatest common divisor of given numbers.";

function runGame()
{

    $gameData = [];
    for ($i = 0; $i < 3; $i++) {
        $startNumber = 1;
        $endNumber = 100;
        $numberOne = rand($startNumber, $endNumber);
        $numberTwo = rand($startNumber, $endNumber);
        if ($numberOne > $numberTwo) {
            $firstNumber = $numberTwo;
            $secondNumber = $numberOne;
        } else {
            $firstNumber = $numberOne;
            $secondNumber = $numberTwo;
        }
        $correctAnswer = $firstNumber;
        while ($correctAnswer > 0) {
            if ((($firstNumber % $correctAnswer ) == 0) && (($secondNumber % $correctAnswer ) == 0)) {
                break;
            }
            $correctAnswer--;
        }
        $gameData[] = ["$numberOne $numberTwo", (string) $correctAnswer];
    }
    startGame($gameData, GAME_DESCRIPTION);
}

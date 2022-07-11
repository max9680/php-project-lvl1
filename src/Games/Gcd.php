<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runWelcome;
use function BrainGames\Engine\startGame;

function runGame()
{
    $name = runWelcome("Find the greatest common divisor of given numbers.");
    $gameData = [];
    $numberGames = 3;
    for ($i = 0; $i < $numberGames; $i++) {
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
        $gameData[$i][0] = "$numberOne $numberTwo";
        $gameData[$i][1] = strval($correctAnswer);
    }
    startGame($gameData, $name, $numberGames);
}

<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const GAME_DESCRIPTION = "Find the greatest common divisor of given numbers.";

function getCommonDivider(int $numberOne, int $numberTwo)
{
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
    return $correctAnswer;
}

function runGame()
{

    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $startNumber = 1;
        $endNumber = 100;
        $numberOne = rand($startNumber, $endNumber);
        $numberTwo = rand($startNumber, $endNumber);
        $correctAnswer = getCommonDivider($numberOne, $numberTwo);
        $gameData[] = ["$numberOne $numberTwo", (string) $correctAnswer];
    }
    startGame($gameData, GAME_DESCRIPTION);
}

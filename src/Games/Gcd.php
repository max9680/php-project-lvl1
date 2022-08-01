<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const GAME_DESCRIPTION = "Find the greatest common divisor of given numbers.";

function getGreatestCommonDivisor(int $number1, int $number2)
{
    while ($number1 !== 0 && $number2 !== 0) {
        if ($number1 > $number2) {
            $number1 = $number1 % $number2;
        } else {
            $number2 = $number2 % $number1;
        }
    }
    return ($number1 + $number2);
}

function runGame()
{

    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $startNumber = 1;
        $endNumber = 100;
        $numberOne = rand($startNumber, $endNumber);
        $numberTwo = rand($startNumber, $endNumber);

        $correctAnswer = getGreatestCommonDivisor($numberOne, $numberTwo);

        $gameData[] = ["$numberOne $numberTwo", (string) $correctAnswer];
    }
    startGame($gameData, GAME_DESCRIPTION);
}

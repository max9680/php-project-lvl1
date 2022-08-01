<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number)
{
    if ($number < 2) {
        return false;
    }
    for ($j = 2; $j <= ($number / 2); $j++) {
        if ($number % $j == 0) {
            return false;
        }
    }
    return true;
}

function runGame()
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $number = rand(1, 100);

        $correctAnswer = (isPrime($number)) ? "yes" : "no";

        $gameData[] = [$number, $correctAnswer];
    }
    startGame($gameData, GAME_DESCRIPTION);
}

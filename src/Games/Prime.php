<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function runGame()
{
    $gameData = [];
    (string) $correctAnswer = null;
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $number = rand(1, 100);
        $correctAnswer = "yes";
        if ($number < 2) {
            $correctAnswer = "no";
        }
        for ($j = 2; $j <= ($number / 2); $j++) {
            if ($number % $j == 0) {
                $correctAnswer = "no";
                break;
            }
        }
        $gameData[] = [$number, $correctAnswer];
    }
    startGame($gameData, GAME_DESCRIPTION);
}

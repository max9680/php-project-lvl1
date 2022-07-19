<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const GAME_DESCRIPTION = "What number is missing in the progression?";

function runGame()
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $amoutNumbers = rand(5, 10);
        $startNumber = rand(1, 10);
        $sumProgression = rand(1, 10);
        $progression = [];
        $hiddenItem = rand(0, $amoutNumbers - 1);
        $progressionInQuestion = '';
        for ($j = 0; $j < $amoutNumbers; $j++) {
            $progression[$j] = $startNumber + $j * $sumProgression;
            if ($j == $hiddenItem) {
                $progressionInQuestion = $progressionInQuestion . ' ..';
            } else {
                $progressionInQuestion = $progressionInQuestion . " " . $progression[$j];
            }
        }
        $gameData[] = [ltrim($progressionInQuestion), (string) $progression[$hiddenItem]];
    }
    startGame($gameData, GAME_DESCRIPTION);
}

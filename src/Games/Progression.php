<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\startGame;

const GAME_DESCRIPTION = "What number is missing in the progression?";

function runGame()
{
    $gameData = [];
    for ($i = 0; $i < 3; $i++) {
        $amoutNumbers = rand(5, 10);
        $startNumber = rand(1, 10);
        $sumProgression = rand(1, 10);
        $progression = array();
        $hiddenItem = rand(0, $amoutNumbers - 1);
        $progressionInQuestion = '';

        //Creating progression
        for ($j = 0; $j < $amoutNumbers; $j++) {
            $progression[$j] = $startNumber + $j * $sumProgression;
            if ($j == $hiddenItem) {
                $progressionInQuestion = $progressionInQuestion . ' ..';
            } else {
                $progressionInQuestion = $progressionInQuestion . " " . $progression[$j];
            }
        }

        $gameData[$i][0] = ltrim($progressionInQuestion);
        $gameData[$i][1] = strval($progression[$hiddenItem]);
    }
    startGame($gameData, GAME_DESCRIPTION);
}

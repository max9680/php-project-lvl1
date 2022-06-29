<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\welcome;
use function BrainGames\Engine\result;
use function Cli\line;
use function Cli\prompt;

function runGame()
{
    $name = welcome();
    line("What number is missing in the progression?");
    $numberCorrectAnswers = 0;
    $incorrectAnswer = 0;
    $numberGames = 3;
    for ($i = 0; $i < $numberGames; $i++) {
        $amoutNumbers = rand(5, 10);
        $startNumber = rand(1, 50);
        $sumProgression = rand(1, 50);
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
        line("Question: %s ", "$progressionInQuestion");
        $answer = prompt("Your answer");
        if (!is_numeric($answer)) {
            $incorrectAnswer = 1;
            break;
        } else {
            $answer = intval($answer);
        }

        if ($answer == $progression[$hiddenItem]) {
            line("Correct!");
            $numberCorrectAnswers++;
        } else {
            line("%s is wrong answer ;(. ", $answer);
            line("Correct answer was %s.", $progression[$hiddenItem]);
            break;
        }
    }
    result($numberCorrectAnswers, $name, $incorrectAnswer);
}

<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\welcome;
use function BrainGames\Engine\result;
use function Cli\line;
use function Cli\prompt;

function runGame()
{
    $name = welcome();

    line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");
    $numberCorrectAnswers = 0;
    $incorrectAnswer = 0;
    $numberGames = 3;
    for ($i = 0; $i < $numberGames; $i++) {
        $number = rand(1, 100);
        line("Question: %s ", "$number");
        $answer = prompt("Your answer");
        if (($answer !== "yes") && ($answer !== "no")) {
            $incorrectAnswer = 1;
            break;
        }
        if ($number == 1) {
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

        if ($answer == $correctAnswer) {
            line("Correct!");
            $numberCorrectAnswers++;
        } else {
            line("%s is wrong answer ;(. ", $answer);
            line("Correct answer was %s.", $correctAnswer);
            break;
        }
    }
    result($numberCorrectAnswers, $name, $incorrectAnswer);
}
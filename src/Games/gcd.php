<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\welcome;
use function BrainGames\Engine\result;
use function Cli\line;
use function Cli\prompt;

function runGame()
{
    $name = welcome();
    line("Find the greatest common divisor of given numbers.");
    $numberCorrectAnswers = 0;
    $incorrectAnswer = 0;
    $numberGames = 3;
    for ($i = 0; $i < $numberGames; $i++) {
        $startNumber = 1;
        $endNumber = 100;
        $numberOne = rand($startNumber, $endNumber);
        $numberTwo = rand($startNumber, $endNumber);
        line("Question: %s", "$numberOne $numberTwo");
        $answer = prompt("Your answer");
        if (!is_numeric($answer)) {
            $incorrectAnswer = 1;
            break;
        } else {
            $answer = intval($answer);
        }

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

<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\welcome;
use function BrainGames\Engine\result;
use function Cli\line;
use function Cli\prompt;

function runGame()
{
    $name = welcome();

    line("Answer \"yes\" if the number is even, otherwise answer \"no\"");

$numberCorrectAnswers = 0;
$incorrectAnswer = 0;
$numberGames = 3;

for ($i = 0;$i < $numberGames;$i++) {
    $startNumber = 0;
    $endNumber = 100;
    $number = rand($startNumber , $endNumber);
    line("Question: %s", $number);
    $answer = prompt("Your answer");
    if (($answer !== "yes") && ($answer !== "no")) {
        $incorrectAnswer = 1;
        break;
    }

    if ($number % 2 == 0) {
        $correctAnswer = "yes";
    } else {
        $correctAnswer = "no";
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
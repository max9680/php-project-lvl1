<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\welcome;
use function BrainGames\Engine\result;
use function cli\line;
use function cli\prompt;

function runGame()
{
    $name = welcome();

    line("What is the result of the expression?");

    $numberCorrectAnswers = 0;
    $incorrectAnswer = 0;
    $numberGames = 3;
    (int) $operationResult = null;

    for ($i = 0; $i < $numberGames; $i++) {
        $startNumber = 0;
        $endNumber = 100;
        $operands = ['+','-','*'];
        $firstNumber = rand($startNumber, $endNumber);
        $secondNumber = rand($startNumber, $endNumber);
        $randIndex = array_rand($operands, 1);
        $operation = $firstNumber . " " . $operands[$randIndex] . " " . $secondNumber;
        line("Question: %s", $operation);
        $answer = prompt("Your answer");

        if (!is_numeric($answer)) {
            $incorrectAnswer = 1;
            break;
        } else {
            $answer = intval($answer);
        }

        switch ($operands[$randIndex]) {
            case '+':
                $operationResult = $firstNumber + $secondNumber;
                break;
            case '-':
                $operationResult = $firstNumber - $secondNumber;
                break;
            case '*':
                $operationResult = $firstNumber * $secondNumber;
                break;
        }

        if ($answer == $operationResult) {
            line("Correct!");
            $numberCorrectAnswers++;
        } else {
            line("'%s' is wrong answer ;(. ", $answer);
            line("Correct answer was '%s'.", $operationResult);
            break;
            $startNumber = 0;
        }
    }

    result($numberCorrectAnswers, $name, $incorrectAnswer);
}

<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\startGame;

const GAME_DESCRIPTION = "What is the result of the expression?";

function getArithmeticOperation(int $firstNumber, int $secondNumber, string $stringOperator)
{
    switch ($stringOperator) {
        case '+':
            return ($firstNumber + $secondNumber);
            break;
        case '-':
            return ($firstNumber - $secondNumber);
            break;
        case '*':
            return ($firstNumber * $secondNumber);
            break;
        default:
            print_r("Unknown arithmetic operation: '$stringOperator'");
            return null;
            break;
    }
}

function runGame()
{
    $operationResult = null;
    $gameData = [];

    for ($i = 0; $i < 3; $i++) {
        $startNumber = 0;
        $endNumber = 100;
        $operands = ['+','-','*'];
        $firstNumber = rand($startNumber, $endNumber);
        $secondNumber = rand($startNumber, $endNumber);
        $randIndex = array_rand($operands, 1);
        $operation = $firstNumber . " " . $operands[$randIndex] . " " . $secondNumber;
        $operationResult = getArithmeticOperation($firstNumber, $secondNumber, $operands[$randIndex]);
        $gameData[$i][0] = $operation;
        $gameData[$i][1] = strval($operationResult);
    }
    startGame($gameData, GAME_DESCRIPTION);
}

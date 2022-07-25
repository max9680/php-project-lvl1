<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const GAME_DESCRIPTION = "What is the result of the expression?";

function getOperationResult(int $firstNumber, int $secondNumber, string $stringOperator)
{
    switch ($stringOperator) {
        case '+':
            $operationResult = $firstNumber + $secondNumber;
            return $operationResult;
        case '-':
            $operationResult = $firstNumber - $secondNumber;
            return $operationResult;
        case '*':
            $operationResult = $firstNumber * $secondNumber;
            return $operationResult;
        default:
            $operationResult = null;
            throw new \Exception("Unknown arithmetic operation: '$stringOperator'");
    }
}

function runGame()
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $startNumber = 0;
        $endNumber = 100;
        $operands = ['+','-','*'];
        $firstNumber = rand($startNumber, $endNumber);
        $secondNumber = rand($startNumber, $endNumber);
        $randIndex = array_rand($operands, 1);
        $operation = $firstNumber . " " . $operands[$randIndex] . " " . $secondNumber;
        $operationResult = getOperationResult($firstNumber, $secondNumber, $operands[$randIndex]);
        $gameData[] = [$operation, (string) $operationResult];
    }
    startGame($gameData, GAME_DESCRIPTION);
}

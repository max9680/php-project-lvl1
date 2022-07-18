<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\startGame;

const GAME_DESCRIPTION = "What is the result of the expression?";

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
        $gameData[$i][0] = $operation;
        $gameData[$i][1] = strval($operationResult);
    }
    startGame($gameData, GAME_DESCRIPTION);
}

<?php

namespace BrainGames\BrainCalc;

use function BrainGames\GameEngine\startGame;

const DESCRIPTION = "What is the result of the expression?";
const OPERATORS = ['+', '-', '*'];

function game()
{
    $data = function () {
        $firstNumber = rand(1, 10);
        $secondNumber = rand(1, 10);
        $operator = OPERATORS[array_rand(OPERATORS)];
        $question = "{$firstNumber} {$operator} {$secondNumber}";

        $calculate = function ($firstNumber, $secondNumber, $operator) {
            if ($operator === '+') {
                return $firstNumber + $secondNumber;
            } elseif ($operator === '-') {
                return $firstNumber - $secondNumber;
            } else {
                return $firstNumber * $secondNumber;
            }
        };

        $correctAnswer = $calculate($firstNumber, $secondNumber, $operator);
        return [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    };
    startGame($data, DESCRIPTION);
}

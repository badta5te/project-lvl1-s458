<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\startGame;

const DESCRIPTION = "What is the result of the expression?";
const OPERATORS = ['+', '-', '*'];

function game()
{
    $data = function () {
        $firstNumber = rand(1, 10);
        $secondNumber = rand(1, 10);
        $operator = OPERATORS[array_rand(OPERATORS)];
        $question = "{$firstNumber} {$operator} {$secondNumber}";

        $getCorrectAnswer = function ($firstNumber, $secondNumber, $operator) {
            switch ($operator) {
                case '+':
                    return $firstNumber + $secondNumber;
                    break;
                case '-':
                    return $firstNumber - $secondNumber;
                    break;
                case '*':
                    return $firstNumber * $secondNumber;
                    break;
            }
        };

        $correctAnswer = $getCorrectAnswer($firstNumber, $secondNumber, $operator);
        return [$question, $correctAnswer];
    };
    startGame($data, DESCRIPTION);
}

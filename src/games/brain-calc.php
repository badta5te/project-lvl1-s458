<?php

namespace BrainGames\BrainCalc;

use function BrainGames\GameEngine\startGame;

const DESCRIPTION = "What is the result of the expression?\n";
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
        return [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    };
    startGame($data, DESCRIPTION);
}

<?php

namespace BrainGames\BrainCalc;

use function cli\line;
use function cli\prompt;

const GREETING = "Welcome to the Brain Game!";
const DESCRIPTION = "What is the result of the expression?";
const ROUNDS = 3;
const OPERATORS = ['+', '-', '*'];

function game()
{
    line(GREETING);
    line(DESCRIPTION);
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    for ($i = 0; $i < ROUNDS; $i++) {
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);
        $operator = OPERATORS[array_rand(OPERATORS)];
        $question = "{$firstNumber} {$operator} {$secondNumber}";
        line('Question: %s', $question);
        $playerAnswer = prompt('Your answer:');
        if ($operator === '+') {
            $correctAnswer = $firstNumber + $secondNumber;
        } elseif ($operator === '-') {
            $correctAnswer = $firstNumber - $secondNumber;
        } else {
            $correctAnswer = $firstNumber * $secondNumber;
        }
        if ($correctAnswer == $playerAnswer) {
            line('Correct!');
        } else {
            line("'%s', is wrong answer ;(. Correct answer was '%s'", $playerAnswer, $correctAnswer);
            return line("Let's try again, %s!", $name);
        }
    }
    line('Congratulations, %s!', $name);
}

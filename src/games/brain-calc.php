<?php

namespace BrainGames\BrainCalc;

use function cli\line;
use function cli\prompt;

const GREETING = "Welcome to the Brain Game!";
const GAME_RULES = "What is the result of the expression?";
const COUNT_OF_ROUNDS = 3;
const OPERATORS = ['+', '-', '*'];

function game()
{
    line(GREETING);
    line(GAME_RULES);
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    $gamesPlayed = 0;

    for ($i = 1; $i <= COUNT_OF_ROUNDS; $i++) {
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);
        $operator = OPERATORS[array_rand(OPERATORS)];
        $question = "{$firstNumber} {$operator} {$secondNumber}";
        line('Question: %s', $question);
        $playerAnswer = prompt('Your answer:');
        if ($operator === '+') {
            $answer = $firstNumber + $secondNumber;
        } elseif ($operator === '-') {
            $answer = $firstNumber - $secondNumber;
        } else {
            $answer = $firstNumber * $secondNumber;
        }
        if ($answer == $playerAnswer) {
            line('Correct!');
            $gamesPlayed++;
        } else {
            break;
        }
    }
    if ($gamesPlayed === 3) {
        line('Congratulations, %s!', $name);
    } else {
        line("'%s', is wrong answer ;(. Correct answer was '%s'\n", $playerAnswer, $answer);
        line("Let's try again, %s!", $name);
    }
}

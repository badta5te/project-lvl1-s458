<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function cli\prompt;

const GREETING = "Welcome to the Brain Game!";
const DESCRIPTION = "Answer 'yes' if number even otherwise answer 'no'.\n";
const ROUNDS = 3;

function isEven(int $question): bool
{
    return $question % 2 === 0;
}

function game()
{
    line(GREETING);
    line(DESCRIPTION);
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    for ($i = 0; $i < ROUNDS; $i++) {
        $question = rand(1, 100);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        line('Question: %s', $question);
        $playerAnswer = prompt('Your answer:');
        if ($correctAnswer === $playerAnswer) {
            line('Correct!');
        } else {
            line("'%s', is wrong answer ;(. Correct answer was '%s'", $playerAnswer, $correctAnswer);
            return line("Let's try again, %s!", $name);
        }
    }
    line('Congratulations, %s!', $name);
}

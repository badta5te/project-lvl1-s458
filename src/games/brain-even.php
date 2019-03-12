<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function cli\prompt;

const GREETING = "Welcome to the Brain Game!";
const GAME_RULES = "Answer 'yes' if number even otherwise answer 'no'.\n";
const COUNT_OF_ROUNDS = 3;

function isEven($question)
{
    return $question % 2 === 0;
}

function game()
{
    line(GREETING);
    line(GAME_RULES);
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);


    for ($i = 0; $i < COUNT_OF_ROUNDS; $i++) {
        $question = rand(1, 100);
        $answer = isEven($question) ? 'yes' : 'no';
        line('Question: %s', $question);
        $playerAnswer = prompt('Your answer:');
        if ($answer === $playerAnswer) {
            line('Correct!');
        } else {
            break;
        }
    }
    if ($i === 3) {
        line('Congratulations, %s!', $name);
    } else {
        line("'%s', is wrong answer ;(. Correct answer was '%s'\n", $playerAnswer, $answer);
        line("Let's try again, %s!", $name);
    }
}

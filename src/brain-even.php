<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function cli\prompt;

const GREETING = "Welcome to the Brain Game!";
const GAME_RULES = "Answer 'yes' if number even otherwise answer 'no'.\n";
const COUNT_OF_ROUNDS = 3;

function isEven($number)
{
    return $number % 2 === 0;
}

function game()
{
    line(GREETING);
    line(GAME_RULES);
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    $gamesPlayed = 0;

    for ($i = 1; $i <= COUNT_OF_ROUNDS; $i++) {
        $number = rand(1, 100);
        $parityOfNumber = isEven($number) ? 'yes' : 'no';
        line('Question: %s', $number);
        $answer = prompt('Your answer:');
        if ($parityOfNumber === $answer) {
            line('Correct!');
            $gamesPlayed++;
        } else {
            break;
        }
    }
    if ($gamesPlayed == 3) {
        line('Congratulations, %s!', $name);
    } else {
        line("'%s', is wrong answer ;(. Correct answer was '%s'\n", $answer, $parityOfNumber);
        line("Let's try again, %s!", $name);
    }
}

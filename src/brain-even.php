<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_GAMES = 3;
const MIN_NUMBER = 1;
const MAX_NUMBER = 100;


function isEven($number)
{
    return $number % 2 === 0;
}

function isEvenGameNumber($number)
{
    return isEven($number) ? 'yes' : 'no';
}

function game()
{
    line('Welcome to the Brain Game!');
    line("Answer 'yes' if number even otherwise answer 'no'.\n");
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    $rightAnswers = 0;

    for ($game = 1; $game <= NUMBER_OF_GAMES; $game++) {
        $number = rand(MIN_NUMBER, MAX_NUMBER);
        line('Question: %s', $number);
        $answer = prompt('Your answer:');
        $gameResult = isEvenGameNumber($number);
        if ($gameResult === $answer) {
            line('Correct!');
            $rightAnswers++;
        } else {
            break;
        }
    }
    if ($rightAnswers == 3) {
        line('Congratulations, %s!', $name);
    } else {
        line("'%s', is wrong answer ;(. Correct answer was '%s'\n", $answer, $gameResult);
        line("Let's try again, %s!", $name);
    }
}

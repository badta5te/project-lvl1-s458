<?php

namespace BrainGames\GameEngine;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

function startGame($data, $description)
{
    line('Welcome to the Brain Game!');
    line($description);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($i = 0; $i < ROUNDS; $i++) {
        $getData = $data();
        $correctAnswer = $getData['correctAnswer'];
        line('Question: %s', $getData['question']);
        $playerAnswer = prompt('Your answer');
        if ($playerAnswer == $correctAnswer) {
            line('Correct!');
        } else {
            return line("'%s', is wrong answer ;(. Correct answer was '%s'" . PHP_EOL .
            "Let's try again, %s!", $playerAnswer, $correctAnswer, $name);
        }
    }
    line('Congratulations, %s!', $name);
}

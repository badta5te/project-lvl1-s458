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
        [$question, $correctAnswer] = $getData;
        line('Question: %s', $question);
        $playerAnswer = prompt('Your answer');
        if ($playerAnswer == $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$playerAnswer}', is wrong answer ;(. Correct answer was '{$correctAnswer}'");
            line("Let's try again, {$name}!");
            exit;
        }
    }
    line('Congratulations, %s!', $name);
}

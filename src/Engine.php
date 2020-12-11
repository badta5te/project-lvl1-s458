<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Menu\menu;

const ROUNDS = 3;

function startGame($getData, $description)
{
    line("{$description}\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($i = 0; $i < ROUNDS; $i++) {
        [$question, $correctAnswer] = $getData();
        line('Question: %s', $question);
        $playerAnswer = prompt('Your answer');
        if ($playerAnswer == $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$playerAnswer}', is wrong answer ;(. Correct answer was '{$correctAnswer}'");
            line("Let's try again, {$name}!");
            return menu();
        }
    }
    line('Congratulations, %s!', $name);
    line();

    return menu();
}

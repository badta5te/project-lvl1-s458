<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\startGame;

const DESCRIPTION = "Answer 'yes' if given number is prime. Otherwise answer 'no'.\n";

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}

function game()
{
    $data = function () {
        $question = rand(1, 100);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    startGame($data, DESCRIPTION);
}

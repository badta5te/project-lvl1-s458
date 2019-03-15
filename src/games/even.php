<?php

namespace BrainGames\Even;

use function BrainGames\Engine\startGame;

const DESCRIPTION = "Answer 'yes' if number even otherwise answer 'no'.";

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function game()
{
    $data = function () {
        $question = rand(1, 100);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    startGame($data, DESCRIPTION);
}

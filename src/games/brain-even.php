<?php

namespace BrainGames\BrainEven;

use function BrainGames\GameEngine\startGame;

use function cli\line;
use function cli\prompt;

const DESCRIPTION = "Answer 'yes' if number even otherwise answer 'no'.\n";

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function game()
{
    $data = function () {
        $number = rand(1, 100);
        $correctAnswer = isEven($number) ? 'yes' : 'no';
        return [
            'question' => $number,
            'correctAnswer' => $correctAnswer
        ];
    };
    startGame($data, DESCRIPTION);
}

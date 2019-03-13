<?php

namespace BrainGames\BrainEven;

use function BrainGames\GameEngine\startGame;

use function cli\line;
use function cli\prompt;

const DESCRIPTION = "Answer 'yes' if number even otherwise answer 'no'.\n";

function isEven(int $question): bool
{
    return $question % 2 === 0;
}

function game()
{

    $data = function () {
        $question = rand(1, 100);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        return [
            'question' => $question,
            'correctAnswer' => $correctAnswer
        ];
    };
    startGame($data, DESCRIPTION);
}
